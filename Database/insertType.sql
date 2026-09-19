USE WIM;

INSERT INTO `role` (id_role, type_role) VALUES
(1, 'user'),
(2, 'admin');

INSERT INTO acces_type (id_acces_type, type_acces) VALUES
(1, 'private'),
(2, 'friend'),
(3, 'public');

INSERT INTO report_type (id_report_type, type_report) VALUES
(1, 'violence'),
(2, 'contenu_sexuel'),
(3, 'harcelement'),
(4, 'illegal'),
(5, 'droits_auteur'),
(6, 'autre');

