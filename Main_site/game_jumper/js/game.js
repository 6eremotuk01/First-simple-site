
function main() {
// === Настройки игры === \\

var PLAYER_SPEED = 250 / 60; // Скорость персонажа (пиксели / секуда[60] === пикселей в секунду)
var ANIMATION_SPEED = 20 / 60; // Скорость анимации (кадры / секуда[60] === кадров в секунду)
var GRAVITATION_SPEED = 60 / 60; // Скорость персонажа (пиксели / секуда[60] === пикселей в секунду)
var JUMP_IMPULSE = 22; // Сила прыжка

var MAX_PLATFORMS = 5; // Максимальное количество платформ на экране
var MAX_PLATFORM_SIZE = 3;
var MIN_PLATFORM_SIZE = 1;

var MAX_CLOUDS = MAX_PLATFORMS;

var GAME_START_SPEED = 0.5; // Начальная скорость игры

// === === === === === === \\


var canvas = document.getElementById("canvas");
var content = canvas.getContext("2d");

content.font = "50px Arial";
content.textBaseline = "center";
content.textAlign = "center";

var simple_platform = new Image();
var left_platform = new Image();
var middle_platform = new Image();
var right_platform = new Image();
var background = new Image();
var bonus = new Image();

simple_platform.src = "img/world/0 (5).png";
left_platform.src = "img/world/0 (6).png";
middle_platform.src = "img/world/0 (7).png";
right_platform.src = "img/world/0 (8).png";
background.src = "img/world/0 (8).png";
bonus.src = "img/world/bonus.png";

var player_walk = [new Image(), new Image()];
player_walk[0].src = "img/player/player_walk1.png"
player_walk[1].src = "img/player/player_walk2.png"
var player_walk_reverse = [new Image(), new Image()];
player_walk_reverse[0].src = "img/player/player_walk1r.png"
player_walk_reverse[1].src = "img/player/player_walk2r.png"

var clouds = [new Image(), new Image(), new Image(), new Image(), new Image(), new Image(), new Image(), new Image(), new Image()];
clouds[0].src = "img/world/cloud1.png";
clouds[1].src = "img/world/cloud2.png";
clouds[2].src = "img/world/cloud3.png";
clouds[3].src = "img/world/cloud4.png";
clouds[4].src = "img/world/cloud5.png";
clouds[5].src = "img/world/cloud6.png";
clouds[6].src = "img/world/cloud7.png";
clouds[7].src = "img/world/cloud8.png";
clouds[8].src = "img/world/cloud9.png";

var player_jump = new Image();
player_jump.src = "img/player/player_jump.png";
var player_jump_reverse = new Image();
player_jump_reverse.src = "img/player/player_jumpr.png";

var player_stand = new Image();
player_stand.src = "img/player/player_idle.png";
var player_stand_reverse = new Image();
player_stand_reverse.src = "img/player/player_idler.png";

var jump_sound = new Audio();
jump_sound.src = "aud/jump.wav";

var play_sound_jump = true;
var i = 0;
var action_type = 0;
var y = 1;
var player_pos = {
    x: canvas.width / 2 - 80 / 2,
    y: 50,
    is_on_plat: false
}
var dirrection = {
    right: false,
    left: false,
    up: false,
    down: false,
}
var rev = false;
var falling = 0;
var score  = 0;
var has_bonus = false;
var jumped = false;

var platform = []
platform[0] = {
    size: 2,
    x: 100,
    y: canvas.height - 170,
    wa_higher: false,
    bonus: false,

    is_moving: false,
    reverse_dirrection: false,
    movement_spray: 5,
    counter: 0
}

var cloud =[];
cloud[0] = {
    image: new Image(),
    x: 0,
    y: 0
}

function reset() {
    platform = [];
    cloud = [];

    for (var i = 0; i < MAX_PLATFORMS - 1; i++)
        platform.push({
            size: Math.floor(Math.random() * MAX_PLATFORM_SIZE + MIN_PLATFORM_SIZE),
            x: Math.floor(Math.random() * canvas.width / 2 + canvas.width / 2 * 0.2),
            y: canvas.height / MAX_PLATFORMS * i + 15,
            wa_higher: false,
            bonus: Math.floor(Math.random() * 1.1),
                
            is_moving: Math.floor(Math.random() * 1.5),
            reverse_dirrection: false,
            movement_spray: Math.floor(Math.random() * 150 + 50),
            counter: 0
        });

    platform.push({size: 3,
        x: (canvas.width / 2 - 70 * 1.5),
        y: canvas.height - 10 - 70,
        wa_higher: true,

        bonus: false,
        is_moving: false,
        reverse_dirrection: false,
        movement_spray: 0,
        counter: 0
    });

    for (var i = 0; i< MAX_CLOUDS; i++) {
        cloud.push({
            image: clouds[Math.floor(Math.random() * 7)],
            x: Math.floor(Math.random() * canvas.width),
            y: (canvas.height + 70) / MAX_CLOUDS * i
        })
    }
}


function animationWalk(pos_x, pos_y, reverse) {
    i += ANIMATION_SPEED;
    if (i >= 2) i = 0;

    if (!reverse) content.drawImage(player_walk[Math.floor(i)], pos_x, pos_y);
    else content.drawImage(player_walk_reverse[Math.floor(i)], pos_x, pos_y);
}

function animationJump(pos_x, pos_y, reverse) {
    i += ANIMATION_SPEED;
    if (i >= 20) i = 0;

    if (!reverse) content.drawImage(player_jump, pos_x, pos_y);
    else content.drawImage(player_jump_reverse, pos_x, pos_y);
}

function animationStand(pos_x, pos_y, reverse) {
    if (!reverse) content.drawImage(player_stand, pos_x, pos_y);
    else content.drawImage(player_stand_reverse, pos_x, pos_y);
}


function playerControl() {
    //alert(event.keyCode);
    switch (event.keyCode) {
        case 38:
            dirrection.up = true;
            break;

        case 37:
            dirrection.left = true;
            rev = true;
            break;

        case 39:
            dirrection.right = true;
            rev = false;
            break;

        case 40:
            dirrection.down = true;
            break;
    }
}

function playerControlReset() {
    switch (event.keyCode ) {
        case 39:
            dirrection.right = false;
            break;

        case 37:
            dirrection.left = false;
            break;

        case 40:
            dirrection.down = false;
            break;
    }
}


function drawPlatform(platform) {
    if (platform.is_moving) {
        if (!platform.reverse_dirrection) {
            if (platform.counter <= platform.movement_spray) {
                platform.counter++;
            }
            else {
                platform.reverse_dirrection = !platform.reverse_dirrection;
            }
        }
        else {
            if (platform.counter >= 0) {
                platform.counter--;
            }
            else {
                platform.reverse_dirrection = !platform.reverse_dirrection;
            }
        }
    }

    if (platform.size == 1) {
        content.drawImage(simple_platform, platform.x + platform.counter, platform.y);
    }
    else if (platform.size == 2) {
        content.drawImage(left_platform, platform.x  + platform.counter, platform.y);
        content.drawImage(right_platform, platform.x + left_platform.width  + platform.counter, platform.y);
    }
    else if (platform.size > 2) {
        var pos = middle_platform.width, new_pos = middle_platform.width;

        content.drawImage(left_platform, platform.x  + platform.counter, platform.y);
        for (var k = 0; k < platform.size - 2; k++) {
            content.drawImage(middle_platform, platform.x  + platform.counter + new_pos, platform.y);
            new_pos += pos;
        }
        content.drawImage(right_platform, platform.x  + platform.counter + new_pos, platform.y);
    }

    if (platform.bonus) {
        content.drawImage(bonus, platform.x  + platform.counter + (simple_platform.width * platform.size) / 2 - bonus.width / 2, platform.y - bonus.height - 2);
    }

}

function drawCloud(cloud) {
    content.drawImage(cloud.image, cloud.x, cloud.y);
}

reset();

function gravitation(position) {
    falling += GRAVITATION_SPEED * y;
    position += falling;
    return position;
}

function draw() {

    // Установка направления и типа анимации
    action_type = 0;
    if (dirrection.left) {
        action_type = 1;
        player_pos.x -= PLAYER_SPEED * x;
    }
    if (dirrection.right) {
        action_type = 1;
        player_pos.x += PLAYER_SPEED * x;
    }
    if (dirrection.up) {
        jumped = true;
        action_type = 2;
        x = 2;
        player_pos.y -= JUMP_IMPULSE * (has_bonus ? 2 : 1);
        if (play_sound_jump) {
            jump_sound.play();
            play_sound_jump = false;
        }
    }
    else x = 1;
    if (dirrection.down) {
        y = GAME_START_SPEED * 2;
    }
    else y = 1;

    //Гравитация
    player_pos.y = gravitation(player_pos.y);

    //Ограничения передвижения
    if (player_pos.x < 0) player_pos.x = 0;
    if (player_pos.x + player_stand.width > canvas.width) player_pos.x = canvas.width - player_stand.width;
    
    content.clearRect(0, 0, canvas.width, canvas.height);
    
    content.fillStyle = "skyblue";
    content.fillRect(0, 0, canvas.width, canvas.height);
    for (var i = 0; i < cloud.length; i++) {
        if (cloud[i].y > canvas.height) {
            cloud.splice(i, 1);
            cloud.push({
                image: clouds[Math.floor(Math.random() * 7)],
                x: Math.floor(Math.random() * (canvas.width - clouds[0].width)),
                y: 0
            })
            cloud[cloud.length - 1].y = -cloud[cloud.length - 1].image.height;
        }

        cloud[i].y += GAME_START_SPEED * 0.2;
        drawCloud(cloud[i]);
    }

    if (player_pos.y + player_stand.height / 2 <= canvas.height * 0.4) {
        for (var i = 0; i < cloud.length; i++)
           cloud[i].y += (JUMP_IMPULSE * (has_bonus ? 2 : 1) - falling) * 0.2;
    }

    for (var block = 0; block < platform.length; block++) {
        // Условие при нахождении выше платформы
        if (player_pos.y + player_stand.height < platform[block].y
            && player_pos.x + player_stand.width - 15 > platform[block].x + platform[block].counter
            && player_pos.x + 15 < platform[block].x + platform[block].counter + simple_platform.width * platform[block].size)
                platform[block].wa_higher = true;


        pers_identication = platform[block].x - player_pos.x;
        // Условие нахождения на платформе
        if (player_pos.y + player_stand.height > platform[block].y
            && player_pos.y + player_stand.height < platform[block].y + simple_platform.height
            && platform[block].wa_higher
            && player_pos.x + player_stand.width - 10 > platform[block].x + platform[block].counter
            && player_pos.x + 10 < platform[block].x + platform[block].counter + simple_platform.width * platform[block].size) {
                player_pos.y = platform[block].y - player_stand.height;
                falling = GAME_START_SPEED + 1;
                dirrection.up = false;
                play_sound_jump = true;

                if (platform[block].is_moving)
                    if (!platform[block].reverse_dirrection) 
                        player_pos.x++;
                    else
                        player_pos.x--;

                if (jumped) has_bonus = false;
                jumped = false;

                bonus_pos = platform[block].x + platform[block].counter + (simple_platform.width * platform[block].size) / 2 - bonus.width / 2;

                if (platform[block].bonus 
                    && (player_pos.x > bonus_pos || player_pos.x + player_stand.width > bonus_pos)
                    && (player_pos.x + player_stand.width < bonus_pos + bonus.width || player_pos.x < bonus_pos + bonus.width)) {
                    has_bonus = true;
                    platform[block].bonus = false;
                    score += 25;
                }
        }
        
        // Условие схода с платформы
        if (platform[block].wa_higher 
            && (!(player_pos.x + player_stand.width - 10 > platform[block].x + platform[block].counter)
            || !(player_pos.x + 10 < platform[block].x + platform[block].counter + simple_platform.width * platform[block].size)))
            platform[block].wa_higher = false;
        
        // Создание новой платформы
        if (platform[block].y  > canvas.height) {
            platform.push({
                size: Math.floor(Math.random() * MAX_PLATFORM_SIZE + MIN_PLATFORM_SIZE),
                x: Math.floor(Math.random() * canvas.width / 2 + canvas.width / 2 * 0.2),
                y: -70,
                wa_higher: false,
                bonus: Math.floor(Math.random() * 1.1),
                 
                is_moving: Math.floor(Math.random() * 1.5),
                reverse_dirrection: false,
                movement_spray: Math.floor(Math.random() * 150 + 50),
                counter: 0
            });
            platform.splice(block, 1);
        }

        if (player_pos.y + player_stand.height / 2 <= canvas.height * 0.4) 
        {
            for (var block_ = 0; block_ < platform.length; block_++)
                platform[block_].y += JUMP_IMPULSE * (has_bonus ? 2 : 1) - falling;
            player_pos.y = canvas.height * 0.4 + 1 - player_stand.height / 2;
            score += 1;
        }

        platform[block].y += GAME_START_SPEED;
        drawPlatform(platform[block]); // Рисуем платформы
    }

    // Условие падения персонажа (конец игры)
    if (player_pos.y - 100 > canvas.height) {
        player_pos.y = canvas.height - player_stand.height;
        alert('Вы проиграли! Ваш счет: ' + Math.floor(score));
        falling = 0;
        dirrection.up = false;
        player_pos = {
            x: canvas.width / 2 - 80 / 2,
            y: canvas.height / 2 + 1 - player_stand.height / 2
        };
        score = 0;
        dirrection.up = false;
        dirrection.down = false;
        dirrection.left = false;
        dirrection.right = false;
        GAME_START_SPEED = 1;
        reset();

        return;
    }

    // Рисование анимации
    switch (action_type) {
        case 0:
            animationStand(player_pos.x, player_pos.y, rev);
            break;

        case 1:
            animationWalk(player_pos.x, player_pos.y, rev);
            break;

        case 2:
            animationJump(player_pos.x, player_pos.y, rev);
            break;
        }
    
    content.strokeStyle = "black";
    content.fillStyle = "white";
    content.fillText(Math.floor(score), canvas.width / 2, 50);
    content.strokeText(Math.floor(score), canvas.width / 2, 50);

    requestAnimationFrame(draw);
}

document.addEventListener("keydown", playerControl);
document.addEventListener("keyup", playerControlReset);

background.onload = draw;
}