<div class="userInfo-container mt-5">

    <div class="userInfo">
        <h3><b>User name</b>: {{Auth::user()->name}}</h3>
        <h3><b>Phone number</b>: {{Auth::user()->phone_number}}</h3>
        <h3><b>Email</b>: {{Auth::user()->email}}</h3>
    </div>
    <div class="userInfo-resetPass pb-5">
        <button id="showForm" type="button" class="btn btn-primary" onclick="showForm()" style="display:inline ;"> Reset password? </button>
        <form class=" mt-2" id="resetPassForm" action="{{route('resetPassword')}}" method="post" style="display: none;">
            @method('patch')
            @csrf
            <h2><b>Reset the password</b></h2>
            <div class="mb-3">
                <input type="password" class="form-control" name="current_password" placeholder="Current password">
            </div>
            <div class="mb-1">
                <input type="password" class="form-control" name="new_password" placeholder="New password">
            </div>
            <div class="mb-1">
                <input type="password" class="form-control" name="confirm_password" placeholder="Confirm password">
            </div>
            <button class="btn MainButt">Reset</button>
        </form>
    </div>

</div>

<script type="text/javascript">
    function showForm() {
        document.getElementById('resetPassForm').style.display = 'block'
        document.getElementById('showForm').style.display = 'none';
    }
</script>
