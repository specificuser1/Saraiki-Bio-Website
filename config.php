<?php
/**
 * Configuration Management System
 * Settings are saved in config_data.php which persists across deployments
 */

// Default configuration template
$defaultConfig = [
    'profile' => [
        'name' => '蘇班_سبحان !',
        'tagline' => 'OWNER OF WARRIOR TEAM',
        'description' => 'OFFLINE SMALL BREAK!',
        'image' => 'profile.jpg',
        'video_bg' => 'background.mp4',
    ],
    'music' => [
        'enabled' => true,
        'audio_file' => 'music.mp3',
        'custom_url' => '',
        'volume' => 0.5,
        'icon' => 'default',
    ],
    'skills' => [
        'PYTHON',
        'NODE.JS',
        'C#',
        'JAVASCRIPT',
        'DISCORD CUSTOM BOTS',
        'PHP'
    ],
    'social' => [
        'discord' => 'https://discord.gg/YOUR_INVITE_LINK',
        'youtube' => 'https://www.youtube.com/@YOUR_CHANNEL',
        'instagram' => 'https://www.instagram.com/YOUR_USERNAME',
        'shop' => 'https://your-shop-link.com'
    ],
    'custom_links' => [],
    'meta' => [
        'title' => '蘇班_سبحان !',
        'description' => 'OFFLINE SMALL BREAK',
        'footer' => '蘇班_سبحان ! | Copyright ©️ 2018-2026'
    ],
    'admin' => [
        'username' => 'subhan',
        'password' => password_hash('root89', PASSWORD_DEFAULT)
    ]
];

// Load saved configuration or create new one
$configFile = __DIR__ . '/config_data.php';

if (file_exists($configFile)) {
    // Load existing configuration
    $config = include $configFile;
    
    // Merge with defaults to ensure all keys exist (for updates)
    $config = array_replace_recursive($defaultConfig, $config);
} else {
    // Create new configuration file
    $config = $defaultConfig;
    saveConfig($config);
}

/**
 * Save configuration to persistent file
 */
function saveConfig($newConfig) {
    $configFile = __DIR__ . '/config_data.php';
    
    $configContent = "<?php\n";
    $configContent .= "/**\n";
    $configContent .= " * PERSISTENT CONFIGURATION DATA\n";
    $configContent .= " * This file is auto-generated and preserves settings across deployments\n";
    $configContent .= " * Last Updated: " . date('Y-m-d H:i:s') . "\n";
    $configContent .= " */\n\n";
    $configContent .= "return " . var_export($newConfig, true) . ";\n";
    $configContent .= "?>";
    
    return file_put_contents($configFile, $configContent);
}

return $config;
?>
