<html xmlns="http://www.w3.org/1999/xhtml"><head>
        <meta charset="utf-8" />
        <meta name="viewport" content="initial-scale=1.0,user-scalable=no,maximum-scale=1,width=device-width" />
        <title>A-Frame HTML Shader - Basic</title>

        <meta name="description" content="360° Image Gallery - A-Frame" />
        <script async="" src="https://www.google-analytics.com/analytics.js"></script><script src="jquery-3.1.1.min.js" type="text/javascript"></script>


        <script src="main.js" type="text/javascript"></script>


        <script src="https://rawgit.com/aframevr/aframe/917c06889ee1f3f79b7b1bbd9eab9815f9512503/dist/aframe.min.js"></script>
        <script src="https://npmcdn.com/aframe-animation-component@3.0.1"></script>
        <script src="https://npmcdn.com/aframe-event-set-component@3.0.1"></script>
        <script src="https://npmcdn.com/aframe-layout-component@3.0.1"></script>
        <script src="https://npmcdn.com/aframe-template-component@3.0.1"></script>
        <script src="components/set-image.js"></script>
        <script src="components/update-raycaster.js"></script>
    </head>
    <body class="a-body aframe-inspector-opened">
        <a-scene vr-mode-ui="" class="fullscreen" canvas="" inspector="" keyboard-shortcuts="" screenshot="">

            <a-assets>

                <img id="moveBtn" crossorigin="anonymous" src="images/buttons/movebtn.png" />
                <audio id="clickSound" crossorigin="anonymous" src="components/click.ogg"></audio>
                <img id="first_image" crossorigin="anonymous" src="images/2.jpg" />
                <img id="second_image" crossorigin="anonymous" src="images/2.jpg" />
                <img id="third_image" crossorigin="anonymous" src="images/3.jpg" />

                <!-- Image link template to be reused. -->
                <script id="link" type="text/nunjucks">
                    &lt;a-plane class="link" height="1" width="1"
                    material="shader: flat; src: {{ thumb }}"
                    event-set__1="_event: mousedown; scale: 1 1 1"
                    event-set__2="_event: mouseup; scale: 1.2 1.2 1"
                    event-set__3="_event: mouseenter; scale: 1.2 1.2 1"
                    event-set__4="_event: mouseleave; scale: 1 1 1"
                    sound="on: click; src: #clickSound"
                    update-raycaster="#cursor"&gt;&lt;/a-plane&gt;
                </script>

            </a-assets>


            <!--<a-sky id="move_btn" radius="10" src="#moveBtn"></a-sky>-->

            <!-- Image links. -->
            <a-entity id="move_to_second_image" layout="type: line; margin: 1.5; width: 100px" position="15 -8 6" scale="3 3 3" visible="" rotation="">
                <a-entity template="src: #link" data-src="#second_image" data-thumb="#moveBtn" position="" rotation="" scale="" visible=""><a-plane class="link" height="1" width="1" material="shader: flat; src: #moveBtn" event-set__1="_event: mousedown; scale: 1 1 1" event-set__2="_event: mouseup; scale: 1.2 1.2 1" event-set__3="_event: mouseenter; scale: 1.2 1.2 1" event-set__4="_event: mouseleave; scale: 1 1 1" sound="on: click; src: #clickSound" update-raycaster="#cursor" geometry="" position="" rotation="" scale="" visible=""></a-plane></a-entity>
            </a-entity>

            <a-entity id="move_to_third_image" layout="type: line; margin: 1.5" position="13 -6 6" scale="3 3 3" visible="" rotation="">
                <a-entity template="src: #link" data-src="#third_image" data-thumb="#moveBtn" position="" rotation="" scale="" visible=""><a-plane class="link" height="1" width="1" material="shader: flat; src: #moveBtn" event-set__1="_event: mousedown; scale: 1 1 1" event-set__2="_event: mouseup; scale: 1.2 1.2 1" event-set__3="_event: mouseenter; scale: 1.2 1.2 1" event-set__4="_event: mouseleave; scale: 1 1 1" sound="on: click; src: #clickSound" update-raycaster="#cursor" geometry="" position="" rotation="" scale="" visible=""></a-plane></a-entity>
            </a-entity>

            <a-entity id="move_to_first_image" layout="type: line; margin: 1.5" position="20 -8 6" scale="3 3 3" visible="" rotation="">
                <a-entity template="src: #link" data-src="#first_image" data-thumb="#moveBtn" position="" rotation="" scale="" visible=""><a-plane class="link" height="1" width="1" material="shader: flat; src: #moveBtn" event-set__1="_event: mousedown; scale: 1 1 1" event-set__2="_event: mouseup; scale: 1.2 1.2 1" event-set__3="_event: mouseenter; scale: 1.2 1.2 1" event-set__4="_event: mouseleave; scale: 1 1 1" sound="on: click; src: #clickSound" update-raycaster="#cursor" geometry="" position="" rotation="" scale="" visible=""></a-plane></a-entity>
            </a-entity>

            <a-sky id="image-360" src="images/2.jpg" material="" geometry="" scale="" position="" rotation="" visible=""></a-sky>

            <!-- sky -->

            <!-- Camera + cursor. -->

            <a-entity id="camera" rotation="1 150 1" position="" scale="" visible="">

                <a-entity camera="" look-controls="" position="" rotation="" scale="" visible="">

                    <a-cursor id="cursor" animation__click="property: scale; startEvents: click; from: 0.1 0.1 0.1; to: 1 1 1; dur: 150" animation__fusing="property: fusing; startEvents: fusing; from: 1 1 1; to: 0.1 0.1 0.1; dur: 1500" event-set__1="_event: mouseenter; color: springgreen" event-set__2="_event: mouseleave; color: black" raycaster="objects: .link" material="" cursor="" geometry="" position="" rotation="" scale="" visible=""></a-cursor>

                </a-entity>
            </a-entity>
            <canvas class="a-canvas a-grab-cursor" data-aframe-canvas="true" width="1920" height="913" style="width: 1536px; height: 731px;"></canvas><a-entity camera="" position="" rotation="" scale="" visible=""></a-entity></a-scene>

        <style>

            #controls{

                position: absolute;
                left: 0;
                top: 100px;

            }

        </style>

        <div id="controls" class="buttons novr">
            <div class="container">
                <div class="row">



                    <form class="pull-left" style="width: 100px;  margin-right: 50px;">
                        <div class="">
                            Scale
                        </div>
                        <div>
                            <span>x</span> <input id="video_scale_x" class="form-control video-scale" step="1" onchange="setVideoSet();" value="80" type="number" />
                            <span>y</span> <input id="video_scale_y" class="form-control video-scale" step="1" onchange="setVideoSet();" value="10" type="number" />
                            <span>z</span> <input id="video_scale_z" class="form-control video-scale" step="1" onchange="setVideoSet();" value="-20" type="number" />
                        </div>
                    </form>

                </div>
            </div>
        </div>

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





            var sky_image = document.getElementById('image-360');
            var camera = document.getElementById('camera');

            var move_to_first_image_btn = document.getElementById(images.third_image.move_btns[0].selector);
            var move_to_second_image_btn = document.getElementById(images.first_image.move_btns[0].selector);
            var move_to_third_image_btn = document.getElementById(images.second_image.move_btns[0].selector);

            function setVideoSet() {


                var x = document.getElementById("video_scale_x").value;
                var y = document.getElementById("video_scale_y").value;
                var z = document.getElementById("video_scale_z").value;

                move_to_first_image_btn.setAttribute('rotation', "" + x + " " + y + " " + z + "");
            }



            function setFirstImg() {

                sky_image.setAttribute('src', 'images/' + images.first_image.image_name);

                move_to_first_image_btn.setAttribute('visible', 'false');
                move_to_second_image_btn.setAttribute('visible', 'true');
                move_to_third_image_btn.setAttribute('visible', 'true');

                move_to_second_image_btn.setAttribute('position', '23 -8 7');
                move_to_third_image_btn.setAttribute('position', '-18 -6 2');

                move_to_second_image_btn.setAttribute('rotation', '-90 -15 0');
                move_to_third_image_btn.setAttribute('rotation', '-90 10 3');

                camera.setAttribute('rotation', '1 95 1');

                console.log('1');

            }

            function setSecondImg() {

                sky_image.setAttribute('src', 'images/' + images.second_image.image_name);

                move_to_first_image_btn.setAttribute('visible', 'true');
                move_to_second_image_btn.setAttribute('visible', 'false');
                move_to_third_image_btn.setAttribute('visible', 'true');

                move_to_first_image_btn.setAttribute('position', '25 -8 4');
                move_to_third_image_btn.setAttribute('position', '30 -8 4');

                move_to_first_image_btn.setAttribute('rotation', '-80 10 -20');
                move_to_third_image_btn.setAttribute('rotation', '-90 10 -20');

                camera.setAttribute('rotation', '1 -95 1');

                console.log('2');
            }

            function setThirdImg() {

                sky_image.setAttribute('src', 'images/' + images.third_image.image_name);

                move_to_first_image_btn.setAttribute('visible', 'true');
                move_to_second_image_btn.setAttribute('visible', 'true');
                move_to_third_image_btn.setAttribute('visible', 'false');


                move_to_first_image_btn.setAttribute('position', '-8 -10 19');
                move_to_second_image_btn.setAttribute('position', '-28 -10 40');

                move_to_first_image_btn.setAttribute('rotation', '36 142 10');
                move_to_second_image_btn.setAttribute('rotation', '-120 -10 0');


    //            move_to_first_image_btn.setAttribute('rotation', '-70 160 50');

    //            move_to_first_image_btn.setAttribute('scale', '-10 -10 -10'); 71 172 -5
    //            move_to_second_image_btn.setAttribute('rotation', '-120 -10 0');
                camera.setAttribute('rotation', '1 150 1');

                console.log('3');
            }




            move_to_first_image_btn.addEventListener('click', setFirstImg);
            move_to_second_image_btn.addEventListener('click', setSecondImg);
            move_to_third_image_btn.addEventListener('click', setThirdImg);

            $(document).ready(function () {
    //            setFirstImg();
                setSecondImg();
    //            setThirdImg();
            });


        </script>




        <script src="https://cdnjs.cloudflare.com/ajax/libs/nunjucks/2.3.0/nunjucks.min.js"></script><a style="display: none;"></a></body></html>