<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="menu1.css" />
<style>
  .clsoption{
    padding-left: 20px;
  }
  body
            { 
            margin:0px;
            background-color:background-color: background: #000; /* For browsers that do not support gradients */
  background: -webkit-radial-gradient(#010610,#232C3E,#364868); /* Safari 5.1 to 6.0 */
  background: -o-radial-gradient(#010610,#232C3E,#364868); /* For Opera 11.6 to 12.0 */
  background: -moz-radial-gradient(#010610,#232C3E,#364868); /* For Firefox 3.6 to 15 */
  background: radial-gradient(#010610,#232C3E,#364868); /* Standard syntax */;

  }
            .caixa
            {
    background-color: #000;
               padding-left:23% ;
                
                margin: auto auto auto auto;
    width:auto;
    height:7.5%;
                box-shadow: 0px 0px 1em #333;
-webkit-box-shadow: 0px 0px 1em #333;
-moz-box-shadow: 0px 0px 1em #333;
            -webkit-transition: opacity 2s ease-in;
            font-family:Arial;

}
            .menucontato
            {
              
     width:100%;
     height:auto;
                color:white;
                background-color: black;
                margin-top: 1px;
                padding-bottom:1%;
                   
          font-family:Arial;
                box-shadow: 0px 0px 1em #333;
-webkit-box-shadow: 0px 0px 1em #333;
-moz-box-shadow: 0px 0px 1em #333;
            -webkit-transition: opacity 2s ease-in;
                 margin-left: -0.5%;
                margin-right: -0.5%;
                
            }
           
            .oi
            {
                color:black;
            }
            .contato
            {
            font-family:arial;
                margin-left:10%;
                width: auto;
               
                
            }
            .espacao
            {
               margin-left: 22%; 
                
                height: auto;
                width: 55%; 
               
               font-family:Arial;
               border:1px solid black;
              
              background:#FFFFFF;
               
               
            box-shadow: 0px 0px 1em #333;
-webkit-box-shadow: 0px 0px 1em #333;
-moz-box-shadow: 0px 0px 1em #333;
            -webkit-transition: opacity 2s ease-in;
          
            }
            .image
            {
               
                width: auto;
                height: auto;
                margin-left: 69%
                    
            }
            .image2
            {
               margin-top: -5%;
                width: auto;
                height: auto;
                    margin-right: 4%;
                margin-left: 68.25%;     
            }
             .align
            {
                text-align: center;
            }
            .titulo{
                width: 50%;
                height:5%;
                border: 1px solid red;
          margin-left: 24.5%;
                padding-top: 1%;
                color:white;
                text-align: center;
                font-size: 35;
            }
            table 
            { 
			
			color:black;
                
                
             margin-left: 12.5%;
                width: auto;
                  
                line-height: 200%;

            }
            td , th
            {
              align:left;
             font-size: 20;
   
         line-height: 250%;
                 
            }
                        td1 , th1
            {
              align:left;
             font-size: 20;
   
         line-height: 100%;
                 
            }
            .borda
            {
                border: 1px solid orange;
            } 
			.alinha
			{
				text-align:center;
			}
			.alinha1
			{
				margin: 10px auto 10px auto;
			}
			.ins
            {
            padding-top:1%;
                padding-left: 34.9%;
                font-size: 65;
                font-family:arial;
                }
                .branco{
                color :white;
                font-size: 35;
                }
</style>

<div class="caixa">

<div class="espaço">

        <br/><nav id="menu">
<ul>  
  <li><a href="http://www.jorgestreet.com.br/">Site da ETEC Jorge Street</a></li>
</ul></nav> <br/> </div> </div>
</head>
<body>

<div class="espacao">
<div class="ins">EXCUTE</div>
    <div class="alinha1"> 
    <table >
      <tr>
        <td>Inscrição realizada com sucesso!</td><td>Código da inscrição: <?=$_GET['inscricao']?></td></br>
		<td><a href="cdi.php?cod=<?=$_GET['inscricao']?>">Gerar termo de Autorização</a></td>
      </tr>
      </table>
      </div>
   
	 <div class="menucontato"><divc class="oi">.</divc><div class="contato">Contato <div></div><div>.....................................................................</div><div><divc class="oi">.</divc></div>ETEC Jorge Street<div></div>
Rua Bell´Aliance,<div></div> 149 - São Caetano do Sul
Tel: 4238-0424
</div>
            
</body>

</html>