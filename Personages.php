<!DOCTYPE html>
<html>
    <head>
     <?php include 'head.php';?>
     <script language="javascript" type="text/javascript">
function showHide(shID) {
   if (document.getElementById(shID)) {
      if (document.getElementById(shID+'-show').style.display != 'none') {
         document.getElementById(shID+'-show').style.display = 'none';
         document.getElementById(shID).style.display = 'block';
      }
      else {
         document.getElementById(shID+'-show').style.display = 'inline';
         document.getElementById(shID).style.display = 'none';
      }
   }
}
</script>
<style type="text/css">
   /* This CSS is just for presentational purposes. */
   
   #wrap {
      width: 150px;
      height: 200px;
      margin: 30px 60px 30px 40px;
      padding: 10px;
      background-color: darkgrey;
      float: left; 
      display: inline-block;
      z-index:80;
  }

   /* This CSS is used for the Show/Hide functionality. */
   .more {
      display: none; 
      background-color: lightgrey; 
      margin-top: -10px;
      margin-left: -10px;
      padding-left: 10px;
      width: 450px;
      position: absolute;
      z-index: 100;
    }
    .more p {
        width: 400px;
        padding-bottom: 10px;
        word-wrap: break-word;
        font-size: 12px;
        
    }
   a.showLink, a.hideLink {
      text-decoration: none;
      color: black;
      text-align: none;
      background: transparent url(down.gif) no-repeat left; };
   a.hideLink {
      background: transparent url(up.gif) no-repeat left; }
</style>
    </head>
    
    <body> 
        <header>
            <?php include 'header.php'; ?>
        </header>

        <div class="info">
            <div id="wrap">
                <img class="personagefoto" src="http://shackmanlab.org/wp-content/uploads/2013/07/person-placeholder.jpg">
                    <h3><a href="#" id="example-show" class="showLink" onclick="showHide('example');return false;">Hans Kazan</a></h3>
                            <a href="#" id="example-hide" class="hideLink" onclick="showHide('example');return false;">
                                <div id="example" class="more">
                                    <h3 style=> Hans Kazan</h3>
                                        <p>FDSAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA</p>
         
                                </div>
                            </a>
            </div>

            <div id="wrap">
                <img class="personagefoto" src="http://shackmanlab.org/wp-content/uploads/2013/07/person-placeholder.jpg">
                    <h3><a href="#" id="example2-show" class="showLink" onclick="showHide('example2');return false;">Hans Kazan</a></h3>
                            <a href="#" id="example2-hide" class="hideLink" onclick="showHide('example2');return false;">
                                <div id="example2" class="more">
                                    <h3> Hans Kazan</h3>
                                        <p>AAPNOOTMIES</p>
         
                                </div>
                            </a>
            </div>

            <div id="wrap">
                <img class="personagefoto" src="http://shackmanlab.org/wp-content/uploads/2013/07/person-placeholder.jpg">
                    <h3><a href="#" id="example3-show" class="showLink" onclick="showHide('example3');return false;">Hans Kazan</a></h3>
                            <a href="#" id="example3-hide" class="hideLink" onclick="showHide('example3');return false;">
                                <div id="example3" class="more">
                                    <h3> Hans Kazan</h3>
                                        <p>MIESNOOTAAP</p>
         
                                </div>
                            
                            </a>
            </div>
</br></br>

            <div id="wrap">
                <img class="personagefoto" src="http://shackmanlab.org/wp-content/uploads/2013/07/person-placeholder.jpg">
                    <h3><a href="#" id="example-show" class="showLink" onclick="showHide('example');return false;">Hans Kazan</a></h3>
                            <a href="#" id="example-hide" class="hideLink" onclick="showHide('example');return false;">
                                <div id="example" class="more">
                                    <h3 style=> Hans Kazan</h3>
                                        <p>FDSAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA</p>
         
                                </div>
                            </a>
            </div>

            <div id="wrap">
                <img class="personagefoto" src="http://shackmanlab.org/wp-content/uploads/2013/07/person-placeholder.jpg">
                    <h3><a href="#" id="example2-show" class="showLink" onclick="showHide('example2');return false;">Hans Kazan</a></h3>
                            <a href="#" id="example2-hide" class="hideLink" onclick="showHide('example2');return false;">
                                <div id="example2" class="more">
                                    <h3> Hans Kazan</h3>
                                        <p>AAPNOOTMIES</p>
         
                                </div>
                            </a>
            </div>

            <div id="wrap">
                <img class="personagefoto" src="http://shackmanlab.org/wp-content/uploads/2013/07/person-placeholder.jpg">
                    <h3><a href="#" id="example3-show" class="showLink" onclick="showHide('example3');return false;">Hans Kazan</a></h3>
                            <a href="#" id="example3-hide" class="hideLink" onclick="showHide('example3');return false;">
                                <div id="example3" class="more">
                                    <h3> Hans Kazan</h3>
                                        <p>MIESNOOTAAP</p>
         
                                </div>
                            
                            </a>
            </div>

        </div>
    </body>
</html>
