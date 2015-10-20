# Installation

Please follow following steps,
  1. Run command `init` to initialize the application with a specific environment.
  2. Create a new database and adjust the `components['db']` configuration in `common/config/main-local.php` accordingly.
  3. Apply migrations with console command `yii migrate`. This will create tables needed for the application to work.
  4. Set document roots of your Web server:
  5. create uploads folder in frontend/web ---> $mkdir frontend/web/uploads

- for frontend `/path/to/yii-application/frontend/web/` and using the URL `http://frontend/`
- for backend `/path/to/yii-application/backend/web/` and using the URL `http://backend/`

### troubleshooting
- In case of error for new user signup, make sure your database has user table and in additional that check if following fields exists in user table -> mobileNumber, addressImage.

- In case of error for uploading profile picture for user make sure uploads folder exist in frontend/web directory.
