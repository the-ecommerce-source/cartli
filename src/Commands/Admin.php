<?php

namespace TES\Cartli\Commands;

use Illuminate\Console\Command;
use TES\Cartli\Models\Admin as AdminModel;
use Illuminate\Support\Facades\Validator;
class Admin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cartli:admin';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create super admin.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {

        $name = $this->ask('What is your name?');
        $email = $this->ask('What is your email?');
        $password = $this->secret('What is the password?');
        $validator = Validator::make([
            'email' => $email,
        ], [
            'email' => ['required', 'email', 'unique:admins,email'],
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            if($errors->has('email')){
                $message = 'The email has already been taken.';
            }   
            $this->info($message);
        }else{
            $create = new AdminModel();
            $create->name = $name;
            $create->email = $email;
            $create->password = bcrypt($password);
            $create->save();

            $headers = ['Name', 'Email'];

            $fields = [
                'Name' => $name,
                'email' => $email
            ];

            $this->info('Super admin has been created.');
            $this->table($headers, [$fields]);
        }
        

        

    }
}
