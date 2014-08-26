<?php

class AuthController extends BaseController {

    public function login(){
        if(Sentry::check()){
            return Redirect::to('/dashboard/');
        }

        try {
            $user = Sentry::findUserByLogin(Input::get('email'));
            Sentry::loginAndRemember($user);
            return Redirect::to('/dashboard/');
        } catch(\Cartalyst\Sentry\Users\LoginRequiredException $e){
            //login field is required
            $error = 'login field required';
        } catch(\Cartalyst\Sentry\Users\UserNotFoundException $e){
            //user not found
            $error = 'user not found';
        } catch(\Cartalyst\Sentry\Users\UserNotActivatedException $e){
            //user not activated
            $error = 'user not activated';
        }

        return View::make('display/auth/login')
            ->with('error', isset($error) ? $error : null);
    }

    public function logout(){
        var_dump(Sentry::check());
        Sentry::logout();
        var_dump(Sentry::check());

        return Redirect::to('/auth/login');
    }

    public function register(){

        if((Request::isMethod('post') &&
            (Input::get('password') == Input::get('password_confirm'))) &&
            (filter_var(Input::get('email'), FILTER_VALIDATE_EMAIL)) !== FALSE)
        {
            try
            {
                // Create the user
                $user = Sentry::createUser(array(
                    'email'       => Input::get('email'),
                    'password'    => Input::get('password'),
                    'activated'   => true,
                    'permissions' => array(
                        'user.create' => -1,
                        'user.delete' => -1,
                        'user.view'   => 1,
                        'user.update' => 1,
                    ),
                ));
            }
            catch (Cartalyst\Sentry\Users\LoginRequiredException $e)
            {
                $error = 'Login field is required.';
            }
            catch (Cartalyst\Sentry\Users\PasswordRequiredException $e)
            {
                $error = 'Password field is required.';
            }
            catch (Cartalyst\Sentry\Users\UserExistsException $e)
            {
                $error = 'User with this login already exists.';
            }
        }

        return View::make('display/auth/register')
            ->with('error', isset($error) ? $error : null);
    }
}
