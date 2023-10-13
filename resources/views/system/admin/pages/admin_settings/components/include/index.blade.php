<!--begin::Card-->
<div class="container">
    <div class="card card-custom gutter-b">
        <div class="card-header flex-wrap py-3">
            <div class="card-title">
                <h3 class="card-label">المسؤول 
                <span class="d-block text-muted pt-2 font-size-sm">تعديل اعدادت المسؤول</span></h3>
            </div>
        </div>
        <div class="card-body">
            <form class="form-horizontal" id="adminSettings_form" data-route="{{ route('admin.admin_setting.update') }}">
                @csrf
                <div class="form-group row">
                    <label for="inputName" class="col-md-3 col-form-label">الاسم</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" id="name"
                        name="name" value="{{ Auth::guard('admin')->user()->name }}" placeholder="Name">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-md-3 col-form-label">اسم المستخدم</label>
                    <div class="col-md-9">
                        <input type="text" name="username" value="{{ Auth::guard('admin')->user()->username }}"
                        id='username' class="form-control" placeholder="ادخل اسم المستخدم">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword3" class="col-md-3 col-form-label">كلمة السر</label>
                    <div class="col-md-9">
                        <input type="password" class="form-control" id="password"
                         name="password" placeholder="ادخل كلمة السر">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="password-confirm" class="col-md-3 col-form-label ">تاكيد كلمة اسر</label>
                    <div class="col-md-9">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" 
                        placeholder="تاكيد كلمة السر">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword3" class="col-md-3 col-form-label">الصورة</label>
                    <div class="col-md-9">
                        <input type="file" class="form-control" id="image" name="image">
                    </div>
                </div>
            
                <!--Here will set id of admin and set it hidden-->
                <input type="hidden" name="admin_id" id="admin_id" value="{{ Auth::guard('admin')->user()->id }}">
                <div class="form-group mb-0 mt-2 row float-right">
                    <div class="col-md-9">
                        <button type="submit" id="submit_button" class="btn btn-info">حفظ</button>
                    </div>
                </div>
            </form>
            
        </div>
    </div>
    <!--end::Card-->

</div>