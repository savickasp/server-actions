Class App\Helpers\ServerConnection handles all actions with api. This class reads config/server-configuration.php fie and gets details how to connect to server.

All routes except dashboard uses ServerController. If routes/action number would increased it would be better to make separate Controllers and divide their responsibility

I will provide separe file server-configuration.php for security reaasons which should be placed in config folder
