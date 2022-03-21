
<div class="addform col-md-6 col-auto">
            <form method="POST"  class=" bg-white rounded-2 p-3 " enctype="multipart/form-data" action="">
                <h3 class="text-center">
                        Update Student
                </h3>
                <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                    <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                    </symbol>
                </svg>
                <div class="form-group mb-3">
                    <input name="id" type="hidden" class="txtField form-control-file" value="<?php echo $Students['id'];?>">
                </div>
                <div class="form-group mb-3">
                    <label>Image</label>
                    <input name="avatar" type="file" class="txtField  form-control-file" value="<?php echo $Students['avatar']; ?>">
                </div>
                <div class="form-group mb-3">
                    <label>Name</label>
                    <input name="name" type="text"  class="txtField form-control" value="<?php if(isset($_POST['update'])){echo $_POST['name'];}else{ echo $Students['name']; }?>">
                    <?php if(!empty($nameErr)){?>
                        <span class="error text-warning fs-6"><svg class="bi flex-shrink-0 me-2" width="18" height="18" role="img" aria-label="danger:"><use xlink:href="#exclamation-triangle-fill"/></svg><?php echo $nameErr;?></span>
                    <?php }?>
                    
                    <?php if(!empty($pregname)){?>
                        <span class="error text-warning fs-6"><svg class="bi flex-shrink-0 me-2" width="18" height="18" role="img" aria-label="danger:"><use xlink:href="#exclamation-triangle-fill"/></svg><?php echo $pregname;?></span>
                    <?php }?>
                </div>
                <div class="form-group mb-3">
                    <label>Email</label>
                    <input name="email" type="text" class="txtField form-control" value="<?php if(isset($_POST['update'])){echo $_POST['email'];}else{ echo $Students['email']; }?>">
                    <?php if(!empty($emailErr)){?>
                        <span class="error text-warning fs-6"><svg class="bi flex-shrink-0 me-2" width="18" height="18" role="img" aria-label="danger:"><use xlink:href="#exclamation-triangle-fill"/></svg><?php echo $emailErr;?></span>
                    <?php }?>
                    
                    <?php if(!empty($pregemail)){?>
                        <span class="error text-warning fs-6"><svg class="bi flex-shrink-0 me-2" width="18" height="18" role="img" aria-label="danger:"><use xlink:href="#exclamation-triangle-fill"/></svg><?php echo $pregemail;?></span>
                    <?php }?>
                </div>
                <div class="form-group mb-3">
                    <label>Phone</label>
                    <input name="phone" type="text" class="txtField form-control" value="<?php if(isset($_POST['update'])){echo $_POST['phone'];}else{ echo $Students['phone']; }?>">
                    <?php if(!empty($phoneErr)){?>
                        <span class="error text-warning fs-6"><svg class="bi flex-shrink-0 me-2" width="18" height="18" role="img" aria-label="danger:"><use xlink:href="#exclamation-triangle-fill"/></svg><?php echo $phoneErr;?></span>
                    <?php }?>
                    
                    <?php if(!empty($pregphone)){?>
                        <span class="error text-warning fs-6"><svg class="bi flex-shrink-0 me-2" width="18" height="18" role="img" aria-label="danger:"><use xlink:href="#exclamation-triangle-fill"/></svg><?php echo $pregphone;?></span>
                    <?php }?>
                </div>
                <div class="form-group mb-3">
                    <label>Enroll Number</label>
                    <input name="enroll_number" type="text" class="txtField form-control" value="<?php if(isset($_POST['update'])){echo $_POST['enroll_number'];}else{ echo $Students['enroll_number']; }?>">
                    <?php if(!empty($enrollErr)){?>
                        <span class="error text-warning fs-6"><svg class="bi flex-shrink-0 me-2" width="18" height="18" role="img" aria-label="danger:"><use xlink:href="#exclamation-triangle-fill"/></svg><?php echo $enrollErr;?></span>
                    <?php }?>

                    <?php if(!empty($pregenroll)){?>
                        <span class="error text-warning fs-6"><svg class="bi flex-shrink-0 me-2" width="18" height="18" role="img" aria-label="danger:"><use xlink:href="#exclamation-triangle-fill"/></svg><?php echo $pregenroll;?></span>
                    <?php }?>
                </div>
                <div class="form-group mb-3 d-flex">
                    <input class="btn btn-outline-info text-secondary text-uppercase fw-bolder w-50" name="update" value="update" type="submit" ></input>
                    <boutton class="btn btn-outline-secondary  text-uppercase fw-bolder w-50" ><a href="student.php" class="text-decoration-none text-info" >back</a></boutton>
                </div>
            </form>
        </div>