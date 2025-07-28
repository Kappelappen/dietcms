-- Skapa tabellen om den inte finns

CREATE TABLE IF NOT EXISTS article (
  id INT AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(255) NOT NULL,
  article_desc TEXT NOT NULL,
  author VARCHAR(100) NOT NULL,
  content TEXT NOT NULL,
  created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Lägg in några exempelartiklar
INSERT INTO article (title, article_desc, 
author, content, created_at) VALUES (
  'Lorem Ipsum One',
  'Description for article Lorem Ipsum One',
  'Admin',
  'Lorem ipsum dolor sit amet, consectetur adipiscing elit. '
  'Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. '
  'Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. '
  'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. '
  'Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
  NOW()
),
(
  'Lorem Ipsum Two',
  'Description for article lorem ipsum two',
  'Editor',
  'Curabitur pretium tincidunt lacus. '
  'Nulla gravida orci a odio. '
  'Nullam varius, turpis et commodo pharetra, est eros bibendum elit, nec luctus magna felis sollicitudin mauris. '
  'Integer in mauris eu nibh euismod gravida. '
  'Duis ac tellus et risus vulputate vehicula.',
  NOW()
),
(
  'Lorem Ipsum Three',
  'Description for article lorem ipsum three',
  'Guest',
  'Morbi in sem quis dui placerat ornare. '
  'Pellentesque odio nisi, euismod in, pharetra a, ultricies in, diam. '
  'Sed arcu. Cras consequat. '
  'Praesent dapibus, neque id cursus faucibus, tortor neque egestas auguae, eu vulputate magna eros eu erat. '
  'Aliquam erat volutpat.',
  NOW()
);
