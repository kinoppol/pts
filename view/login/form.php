<div class="login-content">
                <div class="login-logo">
                    <a href="index.html">
                        <h3 style="color:white">PBMS</h3>
                        <!-- <img class="align-content" src="<?php print site_url('template/sufee-admin/',true); ?>images/logo.png" alt="">
-->
                    </a>
                </div>
                <link href="<?php print site_url('js/select2/dist/css/select2.css',true); ?>" rel="stylesheet"/>
                <div class="login-form">
                    <form action="<?php print $action_url; ?>" method="post">
                        <?php
                        if(!empty($_SESSION['err_message'])){
                        ?>
                    <div class="register-link m-t-15 text-center">
                                    <p style="color:red;"><?php 
                                        print $_SESSION['err_message'];
                                        $_SESSION['err_message']=''; 
                                    
                                    ?></p>
                                </div>
                                <?php
                        }
                                ?>
                        <div class="form-group">
                            <label>หน่วยงาน</label>
                            <select class="js-example-basic-single js-states form-control" id="store_id" name="store_id" required>
                                <option value="">โปรดระบุชื่อหน่วยงาน</option>
                                <?php
                                $llogin=json_decode($_COOKIE['last_login']);
                                    print gen_option($store,$llogin->store_id);
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>ชื่อผู้ใช้</label>
                            <input type="text" class="form-control" placeholder="Username" name="username" value="<?php print empty($llogin->username)?'':$llogin->username; ?>" required>
                        </div>
                            <div class="form-group">
                                <label>รหัสผ่าน</label>
                                <input type="password" class="form-control" placeholder="Password" name="password" required>
                        </div>
                                <div class="checkbox">
                                    <label>
                                <input type="checkbox" name="remember" value="yes"> บันทึกข้อมูลการลงชื่อเข้าใช้
                            </label>
                                    <label class="pull-right">
                                <a href="#">ลืมรหัสผ่าน?</a>
                            </label>

                                </div>
                                <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30">ตกลง</button>
                                <!-- <div class="social-login-content">
                                    <div class="social-button">
                                        <button type="button" class="btn social facebook btn-flat btn-addon mb-3"><i class="ti-facebook"></i>Sign in with facebook</button>
                                        <button type="button" class="btn social twitter btn-flat btn-addon mt-2"><i class="ti-twitter"></i>Sign in with twitter</button>
                                    </div>
                                </div> -->
                                <div class="register-link m-t-15 text-center">
                                    <p>ยังไม่มีข้อมูลร้านค้า ? <a href="#"> ลงทะเบียนร้านค้าเลย</a></p>
                                </div>
                    </form>
                </div>
            </div>
            <?php
            systemFoot('
            <script src="'.site_url('js/select2/dist/js/select2.js',true).'"></script>
            <script>
                jQuery(document).ready(function($){ $("#store_id").select2({
                    
                language: "th",
                width: "100%"
                }); 
                $("#store_id").addClass("form-control");
            });
            </script>');