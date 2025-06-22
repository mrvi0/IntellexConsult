<?php
/**
 * Тестовый скрипт для проверки GitHub API
 * Запустите этот файл в браузере для диагностики
 */

// Настройки
$repo_name = 'mrvi0/IntellexConsult';
$pat = 'YOUR_PAT_TOKEN_HERE'; // Замените на ваш PAT

echo "<h1>Тест GitHub API для обновления темы</h1>";

// 1. Проверяем последний релиз
echo "<h2>1. Проверка последнего релиза</h2>";
$url = "https://api.github.com/repos/{$repo_name}/releases/latest";
$args = ['timeout' => 15];

if (!empty($pat) && $pat !== 'YOUR_PAT_TOKEN_HERE') {
    $args['headers'] = [
        'Authorization' => "Bearer {$pat}",
        'Accept' => 'application/vnd.github+json',
        'X-GitHub-Api-Version' => '2022-11-28',
        'User-Agent' => 'Intellex-Consult-Theme-Updater'
    ];
}

echo "<p><strong>URL запроса:</strong> {$url}</p>";

$response = wp_remote_get($url, $args);

if (is_wp_error($response)) {
    echo "<p style='color: red;'><strong>Ошибка WordPress:</strong> " . $response->get_error_message() . "</p>";
} else {
    $response_code = wp_remote_retrieve_response_code($response);
    $response_body = wp_remote_retrieve_body($response);
    
    echo "<p><strong>HTTP код ответа:</strong> {$response_code}</p>";
    
    if ($response_code !== 200) {
        echo "<p style='color: red;'><strong>Ошибка API:</strong></p>";
        echo "<pre style='background: #f5f5f5; padding: 10px;'>" . htmlspecialchars($response_body) . "</pre>";
    } else {
        $release = json_decode($response_body);
        if ($release && isset($release->tag_name)) {
            echo "<p style='color: green;'><strong>✅ Релиз найден:</strong> {$release->tag_name}</p>";
            echo "<p><strong>Название:</strong> {$release->name}</p>";
            echo "<p><strong>URL релиза:</strong> <a href='{$release->html_url}' target='_blank'>{$release->html_url}</a></p>";
            
            // 2. Формируем правильный URL для скачивания
            echo "<h2>2. URL для скачивания zipball</h2>";
            $zipball_url = "https://api.github.com/repos/{$repo_name}/zipball/{$release->tag_name}";
            echo "<p><strong>Сформированный URL:</strong> <a href='{$zipball_url}' target='_blank'>{$zipball_url}</a></p>";
            
            // 3. Тестируем доступность zipball URL
            echo "<h2>3. Тест доступности zipball URL</h2>";
            $zipball_response = wp_remote_get($zipball_url, $args);
            
            if (is_wp_error($zipball_response)) {
                echo "<p style='color: red;'><strong>❌ Ошибка при скачивании:</strong> " . $zipball_response->get_error_message() . "</p>";
            } else {
                $zipball_code = wp_remote_retrieve_response_code($zipball_response);
                echo "<p><strong>HTTP код ответа zipball:</strong> {$zipball_code}</p>";
                
                if ($zipball_code === 200) {
                    echo "<p style='color: green;'><strong>✅ Zipball доступен для скачивания!</strong></p>";
                    $headers = wp_remote_retrieve_headers($zipball_response);
                    echo "<p><strong>Content-Type:</strong> " . $headers['content-type'] . "</p>";
                    echo "<p><strong>Content-Length:</strong> " . $headers['content-length'] . " байт</p>";
                } else {
                    echo "<p style='color: red;'><strong>❌ Zipball недоступен</strong></p>";
                    $zipball_body = wp_remote_retrieve_body($zipball_response);
                    echo "<pre style='background: #f5f5f5; padding: 10px;'>" . htmlspecialchars($zipball_body) . "</pre>";
                }
            }
            
        } else {
            echo "<p style='color: red;'><strong>❌ Неверный формат ответа</strong></p>";
            echo "<pre style='background: #f5f5f5; padding: 10px;'>" . htmlspecialchars($response_body) . "</pre>";
        }
    }
}

// 4. Сравнение с документацией GitHub
echo "<h2>4. Сравнение с документацией GitHub</h2>";
echo "<p>Согласно документации GitHub API, правильный формат URL для скачивания zipball:</p>";
echo "<pre>https://api.github.com/repos/OWNER/REPO/zipball/REF</pre>";
echo "<p>Где:</p>";
echo "<ul>";
echo "<li>OWNER = mrvi0</li>";
echo "<li>REPO = IntellexConsult</li>";
echo "<li>REF = {$release->tag_name ?? 'TAG_NAME'}</li>";
echo "</ul>";

echo "<p>Наш сформированный URL: <code>https://api.github.com/repos/{$repo_name}/zipball/{$release->tag_name ?? 'TAG_NAME'}</code></p>";

echo "<h2>5. Рекомендации</h2>";
if (empty($pat) || $pat === 'YOUR_PAT_TOKEN_HERE') {
    echo "<p style='color: orange;'><strong>⚠️ Внимание:</strong> PAT токен не настроен. Для приватных репозиториев необходим PAT с правами 'repo'.</p>";
} else {
    echo "<p style='color: green;'><strong>✅ PAT токен настроен</strong></p>";
}

echo "<p><strong>Проверьте:</strong></p>";
echo "<ul>";
echo "<li>Правильность названия репозитория: {$repo_name}</li>";
echo "<li>Наличие релиза с тегом v1.2.7</li>";
echo "<li>Права PAT токена (должен иметь scope 'repo')</li>";
echo "<li>Доступность репозитория (приватный/публичный)</li>";
echo "</ul>";
?> 