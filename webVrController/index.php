<html>
    <head>
        <script src="../components/aframe.min.js" type="text/javascript"></script>
        <script src="js/index.js" type="text/javascript"></script>
    </head>
    <body>
    <a-scene>
        <a-box width=".1" height=".1" depth=".1"  color="#4CC3D9" webvr-controller="0">
            <a-event name="webvrcontrollerbutton1pressed" color="#0000FF"></a-event>
            <a-event name="webvrcontrollerbutton1released" color="#FF0000"></a-event>
        </a-box>
        <a-box width=".1" height=".1" depth=".1"  color="#4CC3D9" webvr-controller="1">
            <a-event name="webvrcontrollerbutton1pressed" color="#0000FF"></a-event>
            <a-event name="webvrcontrollerbutton1released" color="#FF0000"></a-event>
        </a-box>
        <a-camera id="player"></a-camera>
    </a-scene>
</body>
</html>