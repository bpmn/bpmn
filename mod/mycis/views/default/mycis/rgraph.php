<!-- CSS Files -->

<link type="text/css" href="<?php echo $vars['url']; ?>mod/mycis/vendors/Jit/Examples/css/mycisbase.css" rel="stylesheet" />
<link type="text/css" href="<?php echo $vars['url']; ?>mod/mycis/vendors/Jit/Examples/css/RGraph.css" rel="stylesheet" />
<!--[if IE]><script language="javascript" type="text/javascript" src="<?php echo $vars['url']; ?>mod/mycis/vendors/Jit/Extras/excanvas.js"></script><![endif]-->

<!-- JIT Library File -->


<script type="text/javascript" src="<?php echo $vars['url']; ?>mod/mycis/vendors/Jit/jit.js"></script>

<script language ="javascript" type ="text/javascript">


    /**
     *  thanks to javascript infovis library : http://thejit.org/  
     *  
     *  see demo at : http://thejit.org/static/v20/Jit/Examples/RGraph/example1.html
     */
    var labelType, useGradients, nativeTextSupport, animate;

    (function() {
        var ua = navigator.userAgent,
        iStuff = ua.match(/iPhone/i) || ua.match(/iPad/i),
        typeOfCanvas = typeof HTMLCanvasElement,
        nativeCanvasSupport = (typeOfCanvas == 'object' || typeOfCanvas == 'function'),
        textSupport = nativeCanvasSupport 
            && (typeof document.createElement('canvas').getContext('2d').fillText == 'function');
        //I'm setting this based on the fact that ExCanvas provides text support for IE
        //and that as of today iPhone/iPad current text support is lame
        labelType = (!nativeCanvasSupport || (textSupport && !iStuff))? 'Native' : 'HTML';
        nativeTextSupport = labelType == 'Native';
        useGradients = nativeCanvasSupport;
        animate = !(iStuff || !nativeCanvasSupport);
    })();

    var Log = {
        elem: false,
        write: function(text){
            if (!this.elem) 
                this.elem = document.getElementById('log');
            this.elem.innerHTML = text;
            this.elem.style.left = (500 - this.elem.offsetWidth / 2) + 'px';
        }
    };


    function init(){ 
   
        var mycis = document.getElementById('mycis'); 
   
        if (mycis == null)
        {
            return ; 
        }
    
        $.get("<?php echo $vars['url'] . '/pg/cis/cis' ?>" , 
        { 'id' : 23 } , 
        function(data) 
        {     
            var rgraph = createRgraph() ; 
            //load JSON data  
            try
            {
                var $json = eval("(" + data + ")" ) ; 
            }
            catch (err)
            {
                alert (err.toString() + ' ' + data) ; 
                return ; 
            }
            rgraph.loadJSON($json);  
            //trigger small animation  
            rgraph.graph.eachNode(function(n) {  
                var pos = n.getPos();  
                pos.setc(-200, -200);  
            });  
            rgraph.compute('end');  
            rgraph.fx.animate({  
                modes:['polar'],  
                duration: 2000  
            });
                
            $jit.id('inner-details').innerHTML = $json.data.relation;  
                
        }) ; 
    }


    function createRgraph()
    {
        var rgraph = new $jit.RGraph({  
            //Where to append the visualization  
            injectInto: 'mycis',  
            //Optional: create a background canvas that plots  
            //concentric circles.  
            //Add a background canvas for plotting
            //concentric circles.
            background: {
                CanvasStyles: {
                    strokeStyle: '#555',
                    color : 'BF14AE'
                }
            }, 
            canvas : {
                backgroundColor: "#fff" 
            } ,  
            //Add navigation capabilities:  
            //zooming by scrolling and panning.  
            Navigation: {  
                enable: true,  
                panning: true,  
                zooming: 10  
            },  
            //Set Node and Edge styles.  
            Node: {  
                color: '#D5122F'  
            },  
          
            Edge: {  
                color: '#1F3DE6',  
                lineWidth:1.5  
            },  
            onBeforeCompute: function(node){  
                Log.write("centering " + node.name + "...");  
                //Add the relation list in the right column.  
                //This list is taken from the data property of each JSON node.  
                $jit.id('inner-details').innerHTML = node.data.relation;  
            },  
          
            //Add the name of the node in the correponding label  
            //and a click handler to move the graph.  
            //This method is called once, on label creation.  
            onCreateLabel: function(domElement, node){  
                domElement.innerHTML = node.name;  
                domElement.onclick = function(){  
                    rgraph.onClick(node.id, {  
                        onComplete: function() {  
                            Log.write("");  
                        }  
                    });  
                };  
            },  
            //Change some label dom properties.  
            //This method is called each time a label is plotted.  
            onPlaceLabel: function(domElement, node){  
                var style = domElement.style;  
                style.display = '';  
                style.cursor = 'pointer';  
      
                if (node._depth <= 1) {  
                    style.fontSize = "0.8em";  
                    style.color = "#6F717F";  
              
                } else if(node._depth == 2){  
                    style.fontSize = "0.7em";  
                    style.color = "#292929";  
              
                } else {  
                    style.display = 'none';  
                }  
      
                var left = parseInt(style.left);  
                var w = domElement.offsetWidth;  
                style.left = (left - w / 2) + 'px';  
            }  
        }); 
        return rgraph ;
    }

</script>

<?php
$context = get_context();
?>