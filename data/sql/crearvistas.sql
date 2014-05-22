CREATE VIEW NOVEDADALUMNOPARCIAL AS
SELECT ncmh.codigonovedadcursomateriahorario,n.codigoalumno,n.codigoparcial, n.fecha,i.apellido,i.nombre,tn.novedad,c.curso,c.paralelo,m.materia,h.horario 
FROM novedad n,novedadcursomateriahorario ncmh,inspector i,tiponovedad tn,cursomateriahorario cmh,curso c,materia m,horario h
WHERE n.codigonovedad = ncmh.codigonovedad 
AND n.codigoinspector = i.codigoinspector 
AND ncmh.codigotiponovedad = tn.codigotiponovedad
AND ncmh.codigocursomateriahorario = cmh.codigocursomateriahorario
AND cmh.codigocurso = c.codigocurso
AND cmh.codigomateria = m.codigomateria
AND cmh.codigohorario = h.codigohorario
ORDER BY n.fecha ASC

CREATE VIEW FALTAALUMNOPARCIAL AS
SELECT f.codigofalta,f.codigoalumno,f.codigoparcial,f.fecha,i.apellido,i.nombre,tf.falta ,f.descripcion FROM falta f, tipofalta tf,inspector i
WHERE f.codigotipofalta = tf.codigotipofalta
AND f.codigoinspector = i.codigoinspector 
ORDER BY f.fecha ASC