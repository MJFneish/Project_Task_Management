<div class="x-container1">
    <div class="title">
        <div class="head">
            <h2>Profile</h2>
        </div>
        <div class="error-text">!</div>
    </div>
    <form action="" method="post" enctype="multipart/form-data" id="profile-form" >

        <div class="x-profile">
            <img class="x-image" id='avatar' src="<?php echo $user_data['profile_path']?>">
            <div class="input_box">
                <input type="file" name="uimage" id='uimage' >
                <span>Profile</span>
            </div>
        </div>
        <div class="x-inputs">
            <div class="input_box">
                <input type="text" name="uemail" id='uemail' value="<?php echo $user_data['uemail']?>" >
                <span>Uemail</span>
            </div>

            <div class="input_box">
                <input type="text" name="uname" id='uname' value="<?php echo $user_data['uname']?>" >
                <span>Uname</span>
            </div>

            <div class="input_box passwordInput">
                <input type="password" name="upassword" id='upassword' class="pswrd" value="<?php echo $user_data['upass']?>">
                <i class="togglebtn"></i>
                <span>UPassword</span>
            </div>

        </div>
        <div class="x-buttons">
            <div class="link" style="--text-color:#ff2972">
                <button type="submit" class="submit" id='delete' name="submit">
                    <span>DELETE</span>
                    <i></i>
                </button>
            </div>
            <div class="link" style="--text-color:#0ed095">
                <button type="submit" class="submit" id='save' name="submit">
                    <span>Save</span>
                    <i></i>
                </button>
            </div>
            <div class="link" style="--text-color:#a19400">
                <button type="submit" class="submit" id='cancel' name="submit">
                    <span>cancel</span>
                    <i></i>
                </button>
            </div>
        </div>
    </form>
</div>
