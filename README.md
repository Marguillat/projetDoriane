# Projet Doriane
Projet de web-app de planification et gestion de calendrier pour MDS
---
~~~sql
SELECT 
	l.id,m.nom,l.is_hp,l.date_start,l.date_end,m.color 
    FROM `lesson` as l
    INNER JOIN `module` as m ON l.id_module = m.id
    INNER JOIN `session` as s ON m.id_session = s.id
    INNER JOIN `class` as c ON m.id_class = c.id
    INNER JOIN `grade` as g on c.id_grade = g.id
    -- WHERE mon cul = mon cul 
    ;

~~~