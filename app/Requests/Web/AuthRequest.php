<?php

require_once('app/Requests/BaseRequest.php');

class AuthRequest extends BaseRequest
{
    public function validateRegister($data)
    {
        //echo($data);
        if (empty($data['account_name'])) {
            $this->errors['account_name'] = 'Tên tài khoản không được để trống!';
        }
        if (empty($data['email'])) {
            $this->errors['email'] = 'Email không được để trống!';
        }

        if (empty($data['password'])) {
            $this->errors['password'] = 'Mật khẩu không được để trống!';
        }

        if (empty($data['confirmPassword'])) {
            $this->errors['confirmPassword'] = 'Nhập lại nhập lại không được để trống!';
        } else if ($data['password'] != $data['confirmPassword']) {
            $this->errors['confirmPassword'] = 'Mật khẩu phải giống Nhập lại mật khẩu';
        }
        //dd($this->errors);
        return $this->errors;
    }

    public function validateLogin($data)
    {
        if (empty($data['email'])) {
            $this->errors['email'] = 'Địa chỉ email không được để trống!';
        }

        if (empty($data['password'])) {
            $this->errors['password'] = 'Password không được để trống!';
        }
        return $this->errors;
    }

    public function validateReset($data)
    {
        if (empty($data['account_name'])) {
            $this->errors['account_name'] = 'Tên tài khoản không được để trống!';
        }
        return $this->errors;
    }
}
