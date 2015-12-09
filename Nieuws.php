<!DOCTYPE html>
<html>
    <head>
     <?php include 'head.php';?>
    </head>
    
    <body> 
        <header>
            <?php include 'header.php'; ?>
        </header>

        <div class="info">

            <div id="wrapper"> <!--This is the Div 1 in the picture-->
                            <div id="central"> <!--This is the Div 3 in the picture-->
        <div id="top3"> <!--This is the Div 7 in the picture-->
</div>
    </div><!--Closing "central"/Div 3-->
          <div id="topBar"> <!--This is the Div 2 in the picture-->
            <div id="NieuweTekst"> <input type= "text"</div> <!--This is the Div 5 in the picture-->
            <div id="login"><!--This is the Div 6 in the picture-->
            <div class="loginElement"><input type="text" id="txtUsername" class="loginElementBox" size="29"  value="User name" onClick="usernameFocus()" onBlur="usernameBlur()" /></div>               
            <div class="loginElement">
                <input type="text" name="txtFakePassword" id="txtFakePassword" class="loginElementBox" value="Password" onfocus="passwordFocus()" /><input style="display:none;" type="password" id="txtPassword" class="loginElementBoxFocus" onBlur="passwordBlur()" />
            </div>

            <input type="button" id="btnLogin" value="" onclick="login()"><br />

            <span id="lblError"></span>
        </div><!--Closing "login"-->
    </div><!--Closing "topBar"-->
</div><!--Closing "wrapper"-->

        </div>
    </body>
</html>
