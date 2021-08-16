<?php
require __DIR__ . '/partial/init.php';



?>
<?php include __DIR__ . '/partial/html-head.php'; ?>
<?php include __DIR__ . '/partial/navbar.php'; ?>
<style>
    form .form-group small {
        color: red;
    }
</style>


<div class="container mt-4">
    <div class="row">
        <div class="col-md-6">
            <div class="card">

                <div class="card-body">
                    <h5 class="card-title">新增資料</h5>
                    <form name="form1" onsubmit="checkForm(); return false;">
                        <div class="form-group">
                            <label for="res_name">餐廳名稱*</label>
                            <input type="text" class="form-control" id="res_name" name="res_name">
                            <!-- <input type="text" class="form-control" id="res_name" name="res_name" value="測試"> -->
                            <small class="form-text "></small>
                        </div>
                        <div class="form-group">
                            <label for="res_img">餐廳照片</label></br>
                            <input class="mb-2" type="file" id="res_img" name="res_img">
                            <br>
                            <input type="submit" value="上傳">

                        </div>
                        <div class="form-group">
                            <label for="res_production">餐廳介紹</label>
                            <!-- <textarea class="form-control" id="res_production" name="res_production" placeholder="限制輸入45個字" maxlength="45">
                            測試餐廳介紹
                            </textarea> -->
                            <textarea class="form-control" id="res_production" name="res_production" placeholder="限制輸入45個字" maxlength="45"></textarea>
                            <small class="form-text "></small>
                        </div>
                        <div class="form-group">
                            <label for="res_tel">電話</label>
                            <input type="text" class="form-control" id="res_tel" name="res_tel" placeholder="EX:(02)27080170">
                            <!-- <input type="text" class="form-control" id="res_tel" name="res_tel" placeholder="EX:(02)27080170" value="27080170"> -->
                            <small class="form-text "></small>

                        </div>
                        <div class="form-group">
                            <label for="res_starthour">營業時間(開始)</label>
                            <input type="text" class="form-control" id="res_starthour" name="res_starthour" placeholder="EX:11:00">
                            <!-- <input type="text" class="form-control" id="res_starthour" name="res_starthour" placeholder="EX:11:00" value="0800"> -->

                        </div>
                        <div class="form-group">
                            <label for="res_endhour">營業時間(結束)</label>
                            <input type="text" class="form-control" id="res_endhour" name="res_endhour" placeholder="EX:20:00">
                            <!-- <input type="text" class="form-control" id="res_endhour" name="res_endhour" placeholder="EX:20:00" value="1900"> -->

                        </div>
                        <div class="form-group">
                            <label for="res_address">地址</label>
                            <input type="text" class="form-control" id="res_address" name="res_address">
                            <!-- <input type="text" class="form-control" id="res_address" name="res_address" value="台北市"> -->

                        </div>
                        <div class="form-group">
                            <label for="res_price">均價</label>
                            <input type="text" class="form-control" id="res_price" name="res_price">
                            <!-- <input type="text" class="form-control" id="res_price" name="res_price" value="99"> -->

                        </div>
                        <div class="form-group">
                            <label for="res_rate">餐廳評分(0-5分)</label>
                            <input type="text" class="form-control" id="res_rate" name="res_rate" placeholder="EX:4.8" >
                            <!-- <input type="text" class="form-control" id="res_rate" name="res_rate" value="5"> -->

                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include __DIR__ . '/partial/scripts.php'; ?>
<script>
    const res_name = document.querySelector('#res_name');
    const res_tel = document.querySelector('#res_tel');

    const res_tel_re = /^(0\d+)(\d{8})/;


    function checkForm() {
        // try {



            console.log(res_name);
            console.log(res_name.nextElementSibling);

            console.log(res_tel);
            console.log(res_tel.nextElementSibling);


            // 欄位的外觀要回復原來的狀態
            res_name.nextElementSibling.innerHTML = '';
            res_name.style.border = '1px #CCCCCC solid';
            res_tel.nextElementSibling.innerHTML = '';
            res_tel.style.border = '1px #CCCCCC solid';

            let isPass = true;
            if (res_name.value.length === 0) {
                isPass = false;
                res_name.nextElementSibling.innerHTML = '此欄位為必填欄位';
                res_name.style.border = '1px red solid';
            }

            // if (!res_tel_re.test(res_tel.value)) {
            //     isPass = false;
            //     res_tel.nextElementSibling.innerHTML = '請填寫正確的 電話 格式';
            //     res_tel.style.border = '1px red solid';
            // }

            if (isPass) {
                const fd = new FormData(document.form1);
                fetch('insert-api.php', {
                        method: 'POST',
                        body: fd
                    })
                    .then(r => r.json())
                    .then(obj => {
                        console.log(obj);
                        if (obj.success) {
                         location.href = 'res-datalist.php';
                       
                        } else {
                            alert(obj.error);
                        }
                    })
                    .catch(error => {
                        console.log('error:', error);
                    });
            }
        // } catch (err) {
        //     console.log(err);
        // }
    }
</script>

<?php include __DIR__ . '/partial/html-footer.php'; ?>