SELECT u.name, c.name, cm.joined_at
FROM users u
    JOIN community_members cm ON u.id = cm.user_id
    JOIN communities c ON c.id = cm.community_id
WHERE c.created_at>='2013-01-01 00:00:00'
ORDER BY cm.joined_at DESC

/*
 Необходимо написать запрос, по которому будут выданы строки с именем пользователя, названием сообщества, датой
 присоединения к сообществу, упорядоченные по убыванию даты присоединения к сообществу. Выбираемые сообщества должны
 быть созданы не ранее, чем 2013-01-01 00:00:00
 */