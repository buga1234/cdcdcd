<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="initial-scale=1.0,user-scalable=no,maximum-scale=1,width=device-width">
        <title>A-Frame HTML Shader - Basic</title>

        <meta name="description" content="360&deg; Image Gallery - A-Frame">
        <script src="jquery-3.1.1.min.js" type="text/javascript"></script>
        <script src="https://rawgit.com/aframevr/aframe/917c06889ee1f3f79b7b1bbd9eab9815f9512503/dist/aframe.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/nunjucks/2.3.0/nunjucks.min.js"></script>
        <script src="https://npmcdn.com/aframe-animation-component@3.0.1"></script>
        <script src="https://npmcdn.com/aframe-event-set-component@3.0.1"></script>
        <script src="https://npmcdn.com/aframe-layout-component@3.0.1"></script>
        <script src="https://npmcdn.com/aframe-template-component@3.0.1"></script>
        <script src="components/set-image.js" type="text/javascript"></script>
        <script src="components/update-raycaster.js"></script>
        <link href="main.css" rel="stylesheet" type="text/css"/>
        <script>
            var firstload = true;
        </script>
    </head>
    <body class="firstload">

        <div id="welcome" class="loader-wrapper">
            <div class='uil-cube-css' style='-webkit-transform:scale(0.6)'><div></div><div></div><div></div><div></div></div>
        </div>

        <div id="loader" class="loader-wrapper">
            <div class='uil-cube-css' style='-webkit-transform:scale(0.6)'><div></div><div></div><div></div><div></div></div>
        </div>

    <a-scene vr-mode-ui>

        <a-assets>
            <img id="moveBtn" crossorigin="anonymous" src="images/moveBtn.png" alt=""/>
            <img id="viewTextBtn" crossorigin="anonymous" src="images/buttons/ViewInfoBtn.png" alt=""/>
            <img id="viewVideoBtn" crossorigin="anonymous" src="images/buttons/ViewVideoBtn.png">
            <img id="text_image" crossorigin="anonymous" src="images/text-image.jpg">
            <video id="video" autoplay="false" loop="false" src="videos/Video.mp4"></video>
            <audio id="clickSound" crossorigin="anonymous" src="components/click.ogg"></audio>
            <img id="first_image" crossorigin="anonymous" src="images/1.jpg">
            <img id="second_image" crossorigin="anonymous" src="images/2.jpg">
            <img id="third_image" crossorigin="anonymous" src="images/3.jpg">

            <!-- Image link template to be reused. -->
            <script id="link" type="text/nunjucks">
                <a-plane class="link" height="1" width="1"
                material=" src: {{ thumb }} "
                event-set__1="_event: mousedown; scale: 1 1 1"
                event-set__2="_event: mouseup; scale: 1.2 1.2 1"
                event-set__3="_event: mouseenter; scale: 1.2 1.2 1"
                event-set__4="_event: mouseleave; scale: 1 1 1"
                sound="on: click; src: #clickSound"
                update-raycaster="#cursor"></a-plane>
            </script>
            
            <script id="text_temp" type="text/nunjucks">
                <a-plane height="1" width="1"
                material=" src: {{ thumb }} "></a-plane>
            </script>

        </a-assets>

        <!--<a-sky id="move_btn" radius="10" src="#moveBtn"></a-sky>-->

        <!-- Image links. -->
        <a-entity id="move_to_second_image" layout="type: line; margin: 1.5; width: 100px" position="15 -8 6" scale="3 3 3">
            <a-entity template="src: #link" data-src="#second_image" data-thumb="#moveBtn"></a-entity>
        </a-entity>

        <a-entity id="move_to_third_image" layout="type: line; margin: 1.5" position="13 -6 6" scale="3 3 3">
            <a-entity template="src: #link" data-src="#third_image" data-thumb="#moveBtn"></a-entity>
        </a-entity>

        <a-entity id="move_to_first_image" layout="type: line; margin: 1.5" position="20 -8 6" scale="3 3 3">
            <a-entity template="src: #link" data-src="#first_image" data-thumb="#moveBtn"></a-entity>
        </a-entity>

        <a-entity id="video_text_wrapper" look-at="#camera" position="16.64 3.47 0.00" rotation="0.00 0.00 0.00" scale="1.00 1.00 1.00">
            <a-entity id="video_entity" layout="type: line; margin: 1.5" position="19.27 -12.92 -8.17" rotation="1.15 90.53 -0.57" scale="0 0 0" visible="false">
                <a-video src="#video" width="16" height="9"></a-video>
                <a-animation id="video_animation" attribute="scale"
                             dur="1000"
                             begin="scale"
                             fill="forwards"
                             easing="ease-out"
                             from="0 0 0"
                             to="2.54 2.54 2.54"></a-animation>
            </a-entity>

            <a-entity id="text_entity" layout="type: line; margin: 1.5" position="19.27 -10.82 -8.05" rotation="1.00 -90 1.00" scale="0 0 0" visible="false" class="hide">
                <a-entity template="src: #text_temp" data-thumb="#text_image"></a-entity>
                <a-animation id="text_animation" attribute="scale"
                             dur="1000"
                             begin="scale"
                             fill="forwards"
                             easing="ease-out"
                             from="0 0 0"
                             to="48.40 24.55 24.55"></a-animation>
            </a-entity>

            <a-entity id="view_video_btn" layout="type: line; margin: 1.5" position="19.27 5.50 6.00" rotation="1.15 -89.95 -0.57" scale="16.14 6.04 24.04">
                <a-entity template="src: #link" data-src="#first_image" data-thumb="#viewVideoBtn"></a-entity>
            </a-entity>

            <a-entity id="view_text_btn" layout="type: line; margin: 1.5" position="19.27 5.50 -22.16" rotation="1.00 -89.95 1.00" scale="16.14 6.04 24.04">
                <a-entity template="src: #link" data-thumb="#viewTextBtn"></a-entity>
            </a-entity>
        </a-entity>

        <a-sky id="image-360-1" src="#first_image" class="images" visible="false"></a-sky>
        <a-sky id="image-360-2" src="#second_image" class="images" visible="false"></a-sky>
        <a-sky id="image-360-3" src="#third_image" class="images" visible="false"></a-sky>

        <!-- sky -->

        <!-- Camera + cursor. -->

        <a-entity id="camera">

            <a-entity camera look-controls >

                <a-cursor id="cursor"
                          animation__click="property: scale; startEvents: click; from: 0.1 0.1 0.1; to: 1 1 1; dur: 150"
                          animation__fusing="property: fusing; startEvents: fusing; from: 1 1 1; to: 0.1 0.1 0.1; dur: 1500"
                          event-set__1="_event: mouseenter; color: springgreen"
                          event-set__2="_event: mouseleave; color: black"
                          raycaster="objects: .link"></a-cursor>

            </a-entity>
        </a-entity>
    </a-scene>

    <style>

        #controls{

            position: absolute;
            left: 0;
            top: 100px;

        }

    </style>

    <script>

        var images = {
            first_image: {
                image_name: "1.jpg",
                image_selector: "first_image",
                sky_sellector: "image_360",
                move_btns: [
                    {
                        selector: "move_to_second_image",
                        position: "15 -8 6",
                        rotation: "-80 0 0"
                    }
                ],
                camera: {
                    rotation: "0 0 0"
                }
            },
            second_image: {
                image_name: "2.jpg",
                image_selector: "second_image",
                sky_sellector: "image_360",
                move_btns: [
                    {
                        selector: "move_to_third_image",
                        position: "15 -8 6",
                        rotation: "-80 0 0"
                    }
                ],
                camera: {
                    rotation: "0 0 0"
                }
            },
            third_image: {
                image_name: "3.jpg",
                image_selector: "third_image",
                sky_sellector: "image_360",
                move_btns: [
                    {
                        selector: "move_to_first_image",
                        position: "15 -8 6",
                        rotation: "-80 0 0"
                    }
                ],
                camera: {
                    rotation: "0 0 0"
                }
            }
        };





        var camera = document.getElementById('camera');

        var move_to_first_image_btn = document.getElementById(images.third_image.move_btns[0].selector);
        var move_to_second_image_btn = document.getElementById(images.first_image.move_btns[0].selector);
        var move_to_third_image_btn = document.getElementById(images.second_image.move_btns[0].selector);



        var view_video_btn = document.getElementById('view_video_btn');
        var view_text_btn = document.getElementById('view_text_btn');
        var video_entity = document.getElementById('video_entity');

        var video = document.getElementById('video');
        var text_entity = document.getElementById('text_entity');


        function toggleVideo() {
            if (video.paused) {


                video.play();
                video_entity.setAttribute('visible', 'true');
                text_entity.setAttribute('visible', 'false');
                text_entity.classList.add('hide');


                video_entity.emit('scale');

            } else {

                video.pause();
                video_entity.setAttribute('visible', 'false');

            }
        }

        view_video_btn.addEventListener('click', toggleVideo);
//        video_entity.addEventListener('click', toggleVideo);


        view_text_btn.addEventListener('click', function () {

            if (text_entity.classList.contains('hide')) {

                text_entity.classList.remove('hide');
                text_entity.setAttribute('visible', 'true');
                video_entity.setAttribute('visible', 'false');
                video.pause();

                text_entity.emit('scale');

            } else {
                text_entity.classList.add('hide');
                text_entity.setAttribute('visible', 'false');
            }

        });


        function setVideoSet() {


            var x = document.getElementById("video_scale_x").value;
            var y = document.getElementById("video_scale_y").value;
            var z = document.getElementById("video_scale_z").value;

            move_to_first_image_btn.setAttribute('rotation', "" + x + " " + y + " " + z + "");
        }

        function toggleLoader() {
            $('body').toggleClass('wait');
        }


        function operate1() {

            var sky_image = document.getElementById('image-360-1');

            $(".images").attr("visible", "false");
            sky_image.setAttribute('visible', 'true');


            move_to_first_image_btn.setAttribute('visible', 'false');

            move_to_second_image_btn.setAttribute('visible', 'true');
            move_to_third_image_btn.setAttribute('visible', 'true');

            move_to_second_image_btn.setAttribute('position', '11.81 -0.34 3.74');
            move_to_second_image_btn.setAttribute('rotation', '0.00 -98.86 0.00');
            move_to_second_image_btn.setAttribute('scale', '1.10 1.25 0.99');

            move_to_third_image_btn.setAttribute('position', '-18.00 -0.86 1.64');
            move_to_third_image_btn.setAttribute('rotation', '0.00 99.00 0.00');
            move_to_third_image_btn.setAttribute('scale', '2.07 2.57 0.24');


            video_entity.setAttribute('visible', 'false');
            text_entity.setAttribute('visible', 'false');
            view_text_btn.setAttribute('visible', 'false');
            view_video_btn.setAttribute('visible', 'false');



            camera.setAttribute('rotation', '1 95 1');

            toggleLoader();

        }

        function operate2() {
            var sky_image = document.getElementById('image-360-2');
            $(".images").attr("visible", "false");
            sky_image.setAttribute('visible', 'true');

            move_to_first_image_btn.setAttribute('visible', 'true');
            move_to_second_image_btn.setAttribute('visible', 'false');
            move_to_third_image_btn.setAttribute('visible', 'true');

//            move_to_third_image_btn.setAttribute('position', '33.88 1.58 1.26');
//            move_to_third_image_btn.setAttribute('rotation', '0.00 -99.00 0.00');
//            move_to_third_image_btn.setAttribute('scale', '2.07 2.57 0.24');
//
            move_to_third_image_btn.setAttribute('position', '65.63 0.42 1.28');
            move_to_third_image_btn.setAttribute('rotation', '-6.88 -95.68 0.57');
            move_to_third_image_btn.setAttribute('scale', '4.00 5.70 13.70');


            move_to_first_image_btn.setAttribute('position', '18.53 -1.04 5.45');
            move_to_first_image_btn.setAttribute('rotation', '0.00 -99.00 0.00');
            move_to_first_image_btn.setAttribute('scale', '2.24 2.89 3.00');


            video_entity.setAttribute('visible', 'false');
            text_entity.setAttribute('visible', 'false');
            view_text_btn.setAttribute('visible', 'false');
            view_video_btn.setAttribute('visible', 'false');


            camera.setAttribute('rotation', '1 95 1');

            toggleLoader();

        }

        function operate3() {

            var sky_image = document.getElementById('image-360-3');
            toggleLoader();
            if (sky_image.loaded) {
                toggleLoader();
            } else {
                sky_image.addEventListener('loaded', toggleLoader);
            }

            $(".images").attr("visible", "false");
            sky_image.setAttribute('visible', 'true');

            move_to_first_image_btn.setAttribute('visible', 'true');
            move_to_second_image_btn.setAttribute('visible', 'true');
            move_to_third_image_btn.setAttribute('visible', 'false');


            move_to_first_image_btn.setAttribute('position', '-176.08 -18.89 -1.83');
            move_to_first_image_btn.setAttribute('rotation', '0.00 88.81 0.00');
            move_to_first_image_btn.setAttribute('scale', '13.33 20.36 16.51');


            move_to_second_image_btn.setAttribute('position', '-162.41 -6.97 -25.06');
            move_to_second_image_btn.setAttribute('rotation', '0.00 88.00 0.00');
            move_to_second_image_btn.setAttribute('scale', '8.42 11.83 12.70');

            video_entity.setAttribute('visible', 'false');
            text_entity.setAttribute('visible', 'true');
            view_text_btn.setAttribute('visible', 'true');
            view_video_btn.setAttribute('visible', 'true');


            camera.setAttribute('rotation', '1 -100 1');

            console.log('3');

        }

        function setFirstImg() {

            toggleLoader();

            setTimeout(function () {
                operate1();
            }, 1500);

            console.log('1');

        }



        function setSecondImg() {

            toggleLoader();

            setTimeout(function () {
                operate2();
            }, 1500);



        }

        function setThirdImg() {
            toggleLoader();

            setTimeout(function () {
                operate3();
            }, 1500);


        }

        document.querySelector('a-sky').addEventListener('loaded', function () {
            console.log("OK LOADED");
        });

        move_to_first_image_btn.addEventListener('click', setFirstImg);
        move_to_second_image_btn.addEventListener('click', setSecondImg);
        move_to_third_image_btn.addEventListener('click', setThirdImg);


        var scene = document.querySelector('a-scene');
        if (scene.hasLoaded) {
            run();
        } else {
            scene.addEventListener('loaded', run);
        }

        function run() {
            $('body').toggleClass('firstload');
//            setFirstImg();
//            setSecondImg();
            setThirdImg();
        }

    </script>

</body>
</html>

