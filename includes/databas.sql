SQLite format 3   @     ,              	                                                 , .Y   �    
�                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            	� P �'�P                                                                                                                                                                                                                                                                                                                            q
 '�'test@test.comtesttest$2y$10$CZ3AhqpmpxDLY7DNDzFT8OO9R5hq4L13qVDwiQZRjehGT6CFF6qpKtestHejsanHoppsanArrayQ	 �a@a.aaa$2y$10$yFvzzH9pnkW4ulfPUU7FUOa0i.Gc85qZiyvb52eKy1xDZO7wsyLeWa1337g	 -�pille@krille.comkrillekrille$2y$10$aF7KhdYiwyJvzg0pKqq2c.AviO43csM.UgbDjhthYmAkyXFzV4ofmkrilleX #�hej@hej.comHejHej$2y$10$ckkVR2BUFO5wjYlDPMXLx.evfnXp0B76vQ9yq3XyhR7p7LG.T0JjSHej   NH	 � aa$2y$10$voeEMAbqm8/DkKBiU2CiIOHCmcCCrWfVPSTagLPHRLOQbdR1feOAuav ?#�modigsson1991@hotmail.comChristofferModigsson$2y$10$CAeKxpxpIevi7uOBinpnjus7qTaVsNEABd1ft799upr1FU3UKxtAeModig_ %�fisk@fisk.sekebabkungen$2y$10$Gl65aocOHdpDzeeWDJgUTePCHnkXwcMYsnLdhOIU9mp042WPlZ.FWhaha
   � ������                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                             'test@test.com-pille@krille.com#hej@hej.com	a@a.a?modigsson1991@hotmail.com%	fisk@fisk.se
   � ������                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        test
krilleHeja	Modig	haha   � ��                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                              	posts	users`  ���3��                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                  # +http://kebab.seTestaaaarZ^ۉ$ +!http://kebab.seTestaaaaarZ^�Q+ +/http://9gag.comRobert a la Dan
Z[v^   )/#https://google.seFille e fulZW#�4 /=https://google.seKolla inte denna sidan
ZV��  +http://kebab.seasdasdZVl� +http://kebab.seasdZVh�                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               ; ;��X�                                                                                                                                                                                                                                                                                                         �C�etableusersusersCREATE TABLE users (
user_id INTEGER PRIMARY KEY autoincrement,
user_email varchar(255) unique not null,
user_firstname varchar(255) not null,
user_lastname varchar(255) not null,
user_password varchar(60) not null,
user_username varchar(20) unique not null, user_description TEXT, user_picture TEXT)�T�{tablecommentscommentsCREATE TABLE comments (
comment_id INTEGER PRIMARY KEY autoincrement,
time INTEGER not null,
comment TEXT not null,
user_id INTEGER not null,
parent_id INTEGER
votes INTEGER not null)P++Ytablesqlite_sequencesqlite_sequenceCREATE TABLE sqlite_sequence(name,seq))= indexsqlite_autoindex_users_2users)= indexsqlite_autoindex_users_1users    L�                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               �	�ktablepicturespicturesCREATE TABLE pictures (
id INTEGER PRIMARY KEY AUTOINCREMENT,
userid INTEGER not null,
status INTEGER not null)��tablevotesvotesCREATE TABLE votes (
id INTEGER PRIMARY KEY AUTOINCREMENT,
user_id INTEGER NOT NULL,
link_id INTEGER NOT NULL,
value INTEGER NOT NULL)�1�AtablepostspostsCREATE TABLE posts (
id INTEGER PRIMARY KEY AUTOINCREMENT,
link text NOT NULL,
description text NOT NULL,
user_id INTEGER NOT NULL,
time INTEGER NOT NULL)                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                              