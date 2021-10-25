/*
Template Name: Material Admin
Author: Wrappixel
Email: niravjoshi87@gmail.com
File: js
*/
$(function() {
    "use strict";

    var chart = c3.generate({
        bindto: '#chart-earnings',
        data: {
            columns: [
                ['Expense', 5, 6, 3, 7, 9, 10, 14, 12, 11, 9, 8, 7, 10, 6, 12, 10, 8],
                ['Earning', 1, 2, 8, 3, 4, 5, 7, 6, 5, 6, 4, 3, 3, 12, 5, 6, 3]
            ],
            type: 'area-spline'
        },
        axis: {
            y: {
                show: false,
                tick: {
                    count: 0,
                    outer: false
                }
            },
            x: {
                show: false,
            }
        },
        padding: {
            top: 10,
            right: 10,
            bottom: 10,
            left: 20,
        },
        point: {
            r: 1,
        },
        legend: {
            hide: true
        },
        color: {
            pattern: ['#eceeef','#5e72e4']
        }
    });

    // ============================================================== 
    // Net income
    // ============================================================== 
    var data = {
        labels: ['1-3', '2-4', '3-5', '4-6', '5-7', '6-8', '7-9'],
        series: [
            [5, 4, 3, 7, 5, 10, 3]
        ]
    };

    var options = {
        axisX: {
            showGrid: false
        },
        seriesBarDistance: 1,
        chartPadding: {
            top: 15,
            right: 15,
            bottom: 5,
            left: 0
        },
        plugins: [
            Chartist.plugins.tooltip()
        ],
        width: '100%'
    };

    var responsiveOptions = [
        ['screen and (max-width: 640px)', {
            seriesBarDistance: 5,
            axisX: {
                labelInterpolationFnc: function(value) {
                    return value[0];
                }
            }
        }]
    ];
    new Chartist.Bar('.net-income', data, options, responsiveOptions);
    // ============================================================== 
    // Sales topbox
    // ============================================================== 
    var chart = c3.generate({
        bindto: '#sales',
        data: {
            columns: [
                ['Sales', 5, 6, 3, 7, 9, 10, 14, 12, 11, 9, 8, 7, 10, 6, 12, 10, 8]
            ],
            type: 'area-spline'
        },
        axis: {
            y: {
                show: false,
                tick: {
                    count: 0,
                    outer: false
                }
            },
            x: {
                show: false,
            }
        },
        padding: {
            top: 0,
            right: -8,
            bottom: -28,
            left: -8,
        },
        point: {
            r: 0,
        },
        legend: {
            hide: true
            //or hide: 'data1'
            //or hide: ['data1', 'data2']
        },
        color: {
            pattern: ['#fff']
        }
    });

    // ============================================================== 
    // Revanue topbox
    // ============================================================== 
    var chart = c3.generate({
        bindto: '#revenue',
        data: {
            columns: [
                ['Sales', 1, 6, 12, 7, 9, 5, 14, 12, 18, 9, 8, 7, 10, 6, 12, 10, 8]
            ],
            type: 'area-spline'
        },
        axis: {
            y: {
                show: false,
                tick: {
                    count: 0,
                    outer: false
                }
            },
            x: {
                show: false,
            }
        },
        padding: {
            top: 0,
            right: -8,
            bottom: -28,
            left: -8,
        },
        point: {
            r: 0,
        },
        legend: {
            hide: true
            //or hide: 'data1'
            //or hide: ['data1', 'data2']
        },
        color: {
            pattern: ['#fff']
        }
    });
    // ============================================================== 
    // Visitors
    // ============================================================== 
    var chart = c3.generate({
        bindto: '#visitor',
        data: {
            columns: [
                ['Desktop', 40],
                ['Tablet', 12],
                ['Mobile', 28],
                ['None', 60]
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
            title: "Variations",
            width: 25,

        },

        legend: {
            hide: true
            //or hide: 'data1'
            //or hide: ['data1', 'data2']
        },
        color: {
            pattern: ['#40c4ff', '#2961ff', '#ff821c', '#e9edf2']
        }
    });

    // ============================================================== 
    // sales
    // ============================================================== 

    var chart = c3.generate({
        bindto: '#sales2',
        data: {
            columns: [
                ['2011', 45],
                ['2012', 15],
                ['2013', 27]
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
            width: 15,
        },

        legend: {
            hide: true
            //or hide: 'data1'
            //or hide: ['data1', 'data2']
        },
        color: {
            pattern: ['#40c4ff', '#2961ff', '#ff821c']
        }
    });

    
    var barEl = $("#visits");
    var barValues = [40,32,65,53,62,55,24,67,45,70,45,56,34,67,76,32,65,53,62,55];
    var barValueCount = barValues.length;
    var visits = function(){
         barEl.sparkline(barValues, {
            type: 'bar',
            height: 78,
            barWidth: 3,
            barSpacing: 5,
            zeroAxis: false,
            tooltipSuffix: ' Visits',
            barColor: 'rgba(0,0,0,.25)'
        });
        $('#monthlysales').sparkline([4, 5, 0, 10, 9, 12, 4, 9, 4, 5, 3], {
            type: 'bar',
            width: '100%',
            height: '70',
            barWidth: '2',
            resize: true,
            barSpacing: '6',
            barColor: '#a880fa'
        });
    }



    $(window).on('resizeEnd', function(){
            visits();
    })
    
    visits();

});