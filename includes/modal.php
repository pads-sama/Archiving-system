 <div id="admin-modal" class="admin-modal">
     <div class="admin-modal-container">
         <div class="admin-modal-content">
             <div class="style-div">
                 <img src="../asset/images/tcasw.png" alt="" width="200">
             </div>
             <div class="form-container">
                 <?php include '../admin/components/adminAddUser.php' ?>
             </div>
         </div>
     </div>
 </div>
 <style>
     .admin-modal {
         width: 100%;
         height: 100%;
         position: fixed;
         background-color: rgba(0, 0, 0, 0.7);
         display: flex;
         justify-content: center;
         left: 0;
         top: 0;
         display: none;
     }

     .admin-modal-container {
         margin: 5% auto;
         width: 60%;
         height: 70vh;
         background-color: #fefefe;
     }

     .style-div {
         width: 250px;
         height: 70vh;
         background-color: #1c065c;
         position: relative;
     }

     .form-container {
         width: calc(100% - 250px);
         left: 0;
         top: 0;
     }

     .admin-modal-content {
         display: flex;
         flex-direction: row;
     }
 </style>