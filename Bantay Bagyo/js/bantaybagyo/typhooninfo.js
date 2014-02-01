
  
  window.onload=function(){
    // Creates canvas 320 × 200 at 10, 50
    var paper = Raphael(100, 50, 1000, 700);
    var luzon = paper.rect(450, 10, 250, 200);
    luzon.attr("fill", "#33CC00");
    luzon.attr("stroke", "#fff");
    
   
    var vis = paper.rect(480, 250, 250, 100);  
    vis.attr("fill", "#CC6600");
    vis.attr("stroke", "#fff");
    
    
    var min = paper.rect(500, 400, 250, 200);  
    min.attr("fill", "#33CC00");
    min.attr("stroke", "#fff");
    
    
    var pal = paper.rect(250, 400, 300, 50);  
    pal.attr("fill", "#CC6600");
    pal.attr("stroke", "#fff");
    pal.rotate(140,350,420);
    
    
  }
