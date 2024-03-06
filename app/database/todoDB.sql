PRAGMA foreign_keys=OFF;
BEGIN TRANSACTION;
CREATE TABLE todo (id INTEGER PRIMARY KEY AUTOINCREMENT, topic TEXT NOT NULL, task TEXT NOT NULL, is_done BOOLEAN, add_date DATETIME);
INSERT INTO todo VALUES(1,'hello','bob',0,'24-03-06 19-03-20pm');
INSERT INTO todo VALUES(2,'test','hi',0,'24-03-06 19-03-29pm');
INSERT INTO todo VALUES(5,'fixed?','test 3',0,'24-03-06 21-03-30pm');
INSERT INTO todo VALUES(6,'test 4','hi Beck!',0,'24-03-06 22-03-43pm');
INSERT INTO todo VALUES(7,'test 5','hi Jochem!',0,'24-03-06 22-03-03pm');
DELETE FROM sqlite_sequence;
INSERT INTO sqlite_sequence VALUES('todo',7);
COMMIT;
