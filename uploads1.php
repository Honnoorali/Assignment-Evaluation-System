   <!DOCTYPE html>
   <html>
   <head>
      <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">

      <style type="text/css">
            body{
               overflow:hidden;
            }
            input#file-input{
               display: none;
            }

            input#file-input+label{
               background-color: #DC143C  ;
               padding: 10px;
               color: white;
               border-radius: 9px;
               position: absolute;top: 280px;left: 550px;
               width: 350px;
               height: 60px;
               font-size: 50px;
               font-weight: 900;
               text-align: center;
               font-family: sans-serif;

            }

            input#file-input+label:hover{
               background-color:black;
               color: teal
               border:2px solid teal;
               cursor: pointer;
               padding-left: 70px;
            }

            .btn{
               
               font-size: 40px;
               width: 300px;
               height: 70px;
               border-radius: 80px;
               line-height: 60px;
               text-align: center;
               border:4px solid white;
               display: block;
               text-decoration: none;
               margin:300px auto;
               position: relative;top: 80px;left: 450px;
               color: teal;
               overflow: hidden;
               background:transparent;
               transition: .3s;
               font-weight: 900;
            }
            .btn:before{
                content: "";
                width: 100%;
                height: 100%;
                position: absolute;
                background:#DC143C;
                opacity: .5;
                top: -100%;
                left: 0;
                z-index: -1;
                transition: .3s;
            }
            .btn:after{
               content: "";
                width: 100%;
                height: 100%;
                position: absolute;
                background:#DC143C;
                top: -100%;
                left: 0;
                z-index: -1;
                transition: .3s;
                transition-delay: .3s;
            }
            .btn:hover{
               color: #fff;
            }
            .btn:hover:before{
               top: 0;
            }
            .btn:hover:after{
               top: 0;
            }
            .l1{
               color: white;
               position: relative;top: 360px;left: 550px;
               font-size: 25px;
            }
            .i{
               position: absolute;top: 120px;left: 90px;
               border:none;
               background:none;
               outline: none;
               font-size: 25px;
               font-weight: 900;   
               color: white;
               border-bottom: 3px solid #03a9f4;
               width: 200px;
               padding: 10px;

            }
            .i:hover{
               border-bottom: 3px solid teal;
               width: 300px;
            }
            .c{
               position: absolute;top: 220px;left: 20px;
               background:black;
               opacity: .25;
               color: white;
               width: 470px;
               height: 280px;
               text-align: center;
               font-size: 20px;
            }
            .s{
               position: absolute;top: 120px;left: 450px;
               border:none;
               background:none;
               outline: none;
               font-size: 25px;
               font-weight: 900;   
               color: white;
               border-bottom: 3px solid #03a9f4;
               width: 250px;
               padding: 10px;
            }
            .s:hover{
               border-bottom: 3px solid teal;
               width: 300px;
            }
            .p{
               position: absolute;top: 120px;left: 900px;
               border:none;
               background:none;
               outline: none;
               font-size: 25px;
               font-weight: 900;   
               color: white;
               border-bottom: 3px solid #03a9f4;
               width: 250px;
               padding: 10px;
            }
            .p:hover{
               border-bottom: 3px solid teal;
               width: 300px;
            }
      </style>
   </head>
   <body background="5.jpg">
   		
   		<div id="body">
   			<form action="uploads2.php" method="post" enctype="multipart/form-data">
   				<input type="file" name="file" id="file-input">
               <label for="file-input">SELECT FILE</label>
               <div class="l1">
      				<span>
                     <strong>Choosen file :</strong>
                     <span id="file-name">None</span>
                  </span>
               </div>
               <input type="text" class="i" placeholder="USN" name="sid" required="">
               <input type="text" class="s" placeholder="Subject name" name="sn" required="">
               <input type="text" class="p" placeholder="Project name" name="pn" required="">
   				<button type="submit" name="submit" class="btn">UPLOAD</button>
               <div class="c">
                  <p><b><br>The extenions type of files accepted are :<br>
                     <h3>.zip&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;.pdf</h3>
                     
                     The maximum size limit to upload the file is : &nbsp;<h4>30MB</h4>
                      "You are allowed once to upload the assignment."</b>
                  </p>
               </div>
               
                <script>
                  let inputfile=document.getElementById('file-input');
                  let filenamefield=document.getElementById('file-name');
                  inputfile.addEventListener('change',function(event){
                  let uploadedfilename=event.target.files[0].name;
                  filenamefield.textContent=uploadedfilename;
            })
         </script>
   				
   				
   			</form>
   			<br><br>


   			<?php
   				if(isset($_GET['success']))
   				{
   				?>
   				<label>Successfully the file has been uploaded...!</label>
   				<?php
   				}
   				elseif(isset($_GET['fail']))
   				{
   				?>
   				<label>Invalid file extensions</label>
   				<?php
   				}
   				/*else
   				{
   				?>
   				<label>try</label>
   				<?php
   				}*/
   			?>
   		</div>


   </body>
   </html>

