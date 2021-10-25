/*
Template Name: Admin Pro Admin
Author: Wrappixel
Email: niravjoshi87@gmail.com
File: js
*/
$(function() {
    "use strict";
    // ============================================================== 
    // Our Visitor
    // ============================================================== 

    var chart = c3.generate({
        bindto: '#visitor',
        data: {
            columns: [
                ['Desktop', 60],
                ['Tablet', 12],
                ['Mobile', 28],

            ],

            type: 'donut',
            onclick: function(d, i) { console.log("onclick", d, i); },
            onmouseover: function(d, i) { console.log("onmouseover", d, i); },
            onmouseout: function(d, i) { console.log("onmouseout", d, i); }
        },
        donut: {
            label: {
                show: false
            },
            title: "Order",
            width: 35,

        },

        legend: {
            hide: true
            //or hide: 'data1'
            //or hide: ['data1', 'data2']
        },
        color: {
            pattern: ['#40c4ff', '#2961ff', '#ff821c', '#7e74fb']
        }
    });

    // ============================================================== 
    // Conversation Rate
    // ============================================================== 
    var chart = c3.generate({
        bindto: '.rate',
        data: {
            columns: [
                ['Conversation', 85],
                ['other', 15],
            ],
            
            type : 'donut',
            onclick: function (d, i) { console.log("onclick", d, i); },
            onmouseover: function (d, i) { console.log("onmouseover", d, i); },
            onmouseout: function (d, i) { console.log("onmouseout", d, i); }
        },
        donut: {
            label: {
                show: false
              },
            title:"",
            width:5,
            
        }
        , padding: {
            top:10,
             bottom:-20
            
        , },
        legend: {
          hide: true
          //or hide: 'data1'
          //or hide: ['data1', 'data2']
        },
        color: {
              pattern: ['#fff', 'rgba(0, 0, 0, 0.1)', '#fff', '#7e74fb']
        }
    });

    // ============================================================== 
    // product-sales
    // ============================================================== 
    var chart = c3.generate({
        bindto: '.product-earning'
        , data: {
            columns: [
                ['Site A', 5, 6, 3, 7, 9, 10, 14, 12]
                , ['Site B', 1, 2, 8, 3, 4, 5, 7, 6]
            ]
            , type: 'bar'
        }
        , axis: {
            y: {
                show: false
                , tick: {
                    count: 0
                    , outer: false
                }
            }
            , x: {
                show: false
            , }
        },bar: {
          
          width: 8
            
        }
        , padding: {
            top: 0
            , right: 0
            , bottom: -28
            , left: 0
        , }
        , point: {
            r: 0
        , }
        , legend: {
            hide: true
                //or hide: 'data1'
                //or hide: ['data1', 'data2']
        }
        , color: {
            pattern: ['#fff', '#288fee', '#fff', '#7e74fb']
        }
    });

    // ============================================================== 
    // Monthly Overview
    // ==============================================================
    Morris.Area({
        element: 'profit',
        data: [{
                period: '2010',
                iphone: 0,
                ipad: 0,
                itouch: 0
            }, {
                period: '2011',
                iphone: 50,
                ipad: 15,
                itouch: 5
            }, {
                period: '2012',
                iphone: 20,
                ipad: 50,
                itouch: 65
            }, {
                period: '2013',
                iphone: 60,
                ipad: 12,
                itouch: 7
            }, {
                period: '2014',
                iphone: 30,
                ipad: 20,
                itouch: 120
            }, {
                period: '2015',
                iphone: 25,
                ipad: 80,
                itouch: 40
            }, {
                period: '2016',
                iphone: 10,
                ipad: 10,
                itouch: 10
            }


        ],
        lineColors: [ '#0bd2b6', '#058eef'],
        xkey: 'period',
        ykeys: [ 'ipad', 'itouch'],
        labels: ['Site A', 'Site B'],
        pointSize: 0,
        lineWidth: 0,
        resize: true,
        fillOpacity: 0.8,
        behaveLikeLine: true,
        gridLineColor: '#e0e0e0',
        hideHover: 'auto'
        
    });
});