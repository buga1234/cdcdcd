<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="initial-scale=1.0,user-scalable=no,maximum-scale=1,width=device-width">
        <title>A-Frame HTML Shader - Basic</title>

        <script src="jquery-3.1.1.min.js" type="text/javascript"></script>
        <script src="components/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="components/mediaelement.min.js" type="text/javascript"></script>

        <script src="build.js"></script>        
        <link href="components/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css"/>

        <link rel="stylesheet" type="text/css" href="common.css"/>
    </head>
    <body>
    <a-scene vr-mode-ui>



        <a-assets>
            <video id="video_id" autoplay loop="true" src="videos/Video.mp4" webkit-playsinline>
        </a-assets>

        <!-- Using the asset management system. -->
        <a-video id="video" src="#video_id" width="16" height="9" ></a-video>

        <!-- Defining the URL inline. Not recommended but more comfortable for web developers. -->
        <!--<a-video src="video/Video.mp4" width="16" height="9" position="0 1 -1"></a-video>-->


        <!-- sky -->
        <a-sky src="images/1.jpg"></a-sky>

        <a-entity id="camera" position="0 0 5">
            <a-camera></a-camera>
        </a-entity>

    </a-scene>

    <div id="controls" class="buttons novr">

        <div class="container">
            <div class="row">

                <form class="pull-left" style="width: 100px;  margin-right: 50px;">
                    <div class="">
                        Scale
                    </div>
                    <div>
                        <span>x</span> <input id="video_scale_x" class="form-control video-scale" step="0.01" onchange="setVideoSet('video', 'scale');" type="number" value="0.5" />
                        <span>y</span> <input id="video_scale_y" class="form-control video-scale" step="0.01" onchange="setVideoSet('video', 'scale');" type="number" value="0.5" />
                        <span>z</span> <input id="video_scale_z" class="form-control video-scale" step="0.01" onchange="setVideoSet('video', 'scale');" type="number" value="0.5" />
                    </div>
                </form>

                <form class="pull-left" style="width: 100px; margin-right: 50px;">
                    <div class="">
                        Rotation
                    </div>
                    <div>
                        <span>x</span> <input id="video_rotation_x" class="form-control video-rotation" step="1" onchange="setVideoSet('video', 'rotation');" type="number" value="1" />
                        <span>y</span> <input id="video_rotation_y" class="form-control video-rotation" step="1" onchange="setVideoSet('video', 'rotation');" type="number" value="1" />
                        <span>z</span> <input id="video_rotation_z" class="form-control video-rotation" step="1" onchange="setVideoSet('video', 'rotation');" type="number" value="1" />
                    </div>
                </form>

                <form class="pull-left" style="width: 100px; margin-right: 50px;">
                    <div class="">
                        video position
                    </div>
                    <div>
                        <span>x</span> <input id="video_position_x" class="form-control video-position" step="0.1" onchange="setVideoSet('video', 'position');" type="number" value="1" />
                        <span>y</span> <input id="video_position_y" class="form-control video-position" step="0.1" onchange="setVideoSet('video', 'position');" type="number" value="1" />
                        <span>z</span> <input id="video_position_z" class="form-control video-position" step="0.1" onchange="setVideoSet('video', 'position');" type="number" value="1" />
                    </div>
                </form>

                <form class="pull-left" style="width: 100px; margin-right: 50px;">
                    <div class="">
                        camera position
                    </div>
                    <div>
                        <span>x</span> <input id="camera_rotation_x" class="form-control video-position" step="1" onchange="setVideoSet('camera', 'rotation');" type="number" value="1" />
                        <span>y</span> <input id="camera_rotation_y" class="form-control video-position" step="1" onchange="setVideoSet('camera', 'rotation');" type="number" value="1" />
                        <span>z</span> <input id="camera_rotation_z" class="form-control video-position" step="1" onchange="setVideoSet('camera', 'rotation');" type="number" value="1" />
                    </div>
                </form>
            </div>
        </div>

        <div class="clearfix"></div>

        <!--        <a href="javascript:toggleVisibility()">toggle DOM visibility</a>
                <a href="javascript:toggleLettersDebug()">toggle debug mode for letters</a>-->
    </div>

    <script>


        function setVideoSet(el_id, set) {
            console.log(el_id + "_" + set + "_x");
            var x = document.getElementById(el_id + "_" + set + "_x").value;
            var y = document.getElementById(el_id + "_" + set + "_y").value;
            var z = document.getElementById(el_id + "_" + set + "_z").value;

            var element = document.getElementById(el_id);
            element.setAttribute(set, "" + x + " " + y + " " + z + "");


            console.log(element);
        }





        $(document).ready(function () {

            setVideoSet('video', 'scale');
            setVideoSet('video', 'rotation');
            setVideoSet('video', 'position');

//            setVideoSet('camera', 'position');

        });

    </script>

</body>
</html>

