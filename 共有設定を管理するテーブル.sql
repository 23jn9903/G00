-- 共有設定を管理するテーブル
CREATE TABLE share_settings (
    id INT AUTO_INCREMENT PRIMARY KEY,
    content_id INT NOT NULL,               -- 共有対象のコンテンツID(しおりIDなど)
    expires_at TIMESTAMP NULL,             -- 共有リンクの有効期限
    share_token VARCHAR(32) UNIQUE
);