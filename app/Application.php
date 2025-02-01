<?php

namespace Metin2Register;

class Application
{
    /**
     * Run the all application
     */
    public function run()
    {
        $this->loadEnv();
        self::getView('Pages/Register.php');
    }

    /**
     * Load env variables and add it no global env
     * @return void
     */
    private function loadEnv()
    {
        $envData = file_get_contents(ROOT_PATH . DIRECTORY_SEPARATOR . '.env');
        $envData = array_filter(explode("\n", $envData));

        foreach ($envData as $envLine) {
            $envLine = trim($envLine);
            if (empty($envLine) || $envLine[0] === '#') {
                continue;
            }

            list($key, $value) = explode("=", $envLine, 2);

            putenv(trim($key) . "=" . trim($value));
            $_ENV[trim($key)] = trim($value);
        }
    }

    /**
     * Render the register view
     * @param $viewPath After /View/ folder
     * @return void
     */
    public static function getView($viewPath)
    {
        $registerView = sprintf(
            '%s/app/View/%s',
            ROOT_PATH,
            $viewPath
        );

        if (!file_exists($registerView)) {
            throw new \Exception('`%s` not found', $registerView);
        }

        include_once $registerView;
    }
}
