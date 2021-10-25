$(function() {
    "use strict";
    $("#main-wrapper").AdminSettings({
        Theme: false, // this can be true or false ( true means dark and false means light ),
        Layout: 'vertical',
        LogoBg: 'skin6', // You can change the Value to be skin1/skin2/skin3/skin4/skin5/skin6 
        NavbarBg: 'skin1', // You can change the Value to be skin1/skin2/skin3/skin4/skin5/skin6
        SidebarType: 'full', // You can change it full / mini-sidebar / iconbar / overlay
        SidebarColor: 'skin6', // You can change the Value to be skin1/skin2/skin3/skin4/skin5/skin6
        SidebarPosition: false, // it can be true / false
        HeaderPosition: false, // it can be true / false
        BoxedLayout: false, // it can be true / false 
    });
});