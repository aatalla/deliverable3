/* populating customer */

insert into CUSTOMER values("2000-09-20", 77055835, 1, "aatalla@andrew.cmu.edu", "Egypt", "Andria", "Atalla", "password", "elif");
insert into CUSTOMER values("2000-01-2", 12345678, 2, "a@andrew.cmu.edu", "Cambodia", "Abcd", "Efgh", "password", "elif");
insert into CUSTOMER values("2000-02-3", 87654321, 3, "b@andrew.cmu.edu", "Vietnam", "Ijkl", "Mnop", "password", "elif");
insert into CUSTOMER values("2000-03-4", 22471628, 4, "c@andrew.cmu.edu", "United States", "Qrst", "Uvwx", "password", "elif");
insert into CUSTOMER values("2000-04-5", 13082260, 5, "d@andrew.cmu.edu", "England", "Yzab", "cdef", "password", "elif");
insert into CUSTOMER values("2000-05-6", 24561234, 6, "e@andrew.cmu.edu", "Qatar", "ghij", "klmn", "password", "elif");
insert into CUSTOMER values("2000-06-7", 00112233, 7, "f@andrew.cmu.edu", "Scotland", "opqr", "stuv", "password", "elif");
insert into CUSTOMER values("2000-07-8", 44556677, 8, "g@andrew.cmu.edu", "England", "wxyz", "abcd", "password", "elif");
insert into CUSTOMER values("2000-08-9", 88991010, 9, "h@andrew.cmu.edu", "Wales", "efgh", "ijkl", "password", "elif");
insert into CUSTOMER values("2000-10-10", 11111212, 10, "i@andrew.cmu.edu", "Canada", "mnop", "qrst", "password", "elif");

/*populating CCDetails*/
insert into CCDetails values("Visa", "2222222222222222", 123, "abcd", "efgh", "12", "2021", 1);
insert into CCDetails values("Visa", "4444444444444444", 456, "abcd", "efgh", "12", "2021", 2);
insert into CCDetails values("Visa", "6666666666666666", 789, "abcd", "efgh", "12", "2021", 3);
insert into CCDetails values("Master", "8888888888888888", 101, "abcd", "efgh", "12", "2021", 4);
insert into CCDetails values("Visa", "1010101010101010", 505, "abcd", "efgh", "12", "2021", 5);
insert into CCDetails values("Visa", "1133557799113355", 321, "abcd", "efgh", "12", "2021", 6);
insert into CCDetails values("AmericanExpress", "3355779911335577", 654, "abcd", "efgh", "12", "2021", 7);
insert into CCDetails values("Visa", "5577991133557799", 876, "abcd", "efgh", "12", "2021", 8);
insert into CCDetails values("Visa", "7799113355779911", 987, "abcd", "efgh", "12", "2021", 9);
insert into CCDetails values("Visa", "9911335577991133", 098, "abcd", "efgh", "12", "2021", 10);

/* populating stadium */
insert into STADIUM values(2000, 6000, "Lusail Stadium", "street 1", "lusail", 2000, 6000);
insert into STADIUM values(2000, 6000, "Al Bayt Stadium", "street 2", "al khor", 2000, 6000);
insert into STADIUM values(2000, 6000, "Al Janoub Stadium", "street 3", "al wakrah", 2000, 6000);
insert into STADIUM values(2000, 6000, "Al Rayyan Stadium", "street 4", "al rayyan", 2000, 6000);
insert into STADIUM values(2000, 6000, "Khalifa International Stadium", "street 5", "doha", 2000, 6000);
insert into STADIUM values(2000, 6000, "Education City Stadium", "street 6", "doha", 2000, 6000);
insert into STADIUM values(2000, 6000, "Ras Abu Aboud Stadium", "street 7", "ras abu aboud", 2000, 6000);
insert into STADIUM values(2000, 6000, "Al Thumama Stadium", "street 8", "doha", 2000, 6000);

/* populating team */
insert into TEAM values("Qatar");
insert into TEAM values("Egypt");
insert into TEAM values("England");
insert into TEAM values("Scotland");
insert into TEAM values("Italy");
insert into TEAM values("Germany");
insert into TEAM values("Spain");
insert into TEAM values("Argentina");
insert into TEAM values("Brazil");
insert into TEAM values("Tunisia");

/* populating Guest */
insert into GUEST values(11, "Egypt", "2000-09-20", "Abcd", "Efgh", 1);
insert into GUEST values(12, "Qatar", "2000-09-20", "Abcd", "Efgh", 2);
insert into GUEST values(13, "Cambodia", "2000-09-20", "Abcd", "Efgh", 3);
insert into GUEST values(14, "United States", "2000-09-20", "Abcd", "Efgh", 4);
insert into GUEST values(15, "Scotland", "2000-09-20", "Abcd", "Efgh", 5);
insert into GUEST values(16, "England", "2000-09-20", "Abcd", "Efgh", 6);
insert into GUEST values(17, "India", "2000-09-20", "Abcd", "Efgh", 7);
insert into GUEST values(18, "China", "2000-09-20", "Abcd", "Efgh", 8);
insert into GUEST values(19, "Germany", "2000-09-20", "Abcd", "Efgh", 9);
insert into GUEST values(20, "Tunisia", "2000-09-20", "Abcd", "Efgh", 10);

/* populating FOOTBALL_MATCH */
insert into FOOTBALL_MATCH values("2022-09-21", "16:00:00", 1, "Qatar", "Egypt", "Lusail Stadium");
insert into FOOTBALL_MATCH values("2022-09-22", "16:00:00", 2, "Egypt", "Scotland", "Lusail Stadium");
insert into FOOTBALL_MATCH values("2022-09-23", "16:00:00", 3, "England", "Egypt", "Lusail Stadium");
insert into FOOTBALL_MATCH values("2022-09-24", "16:00:00", 4, "Scotland", "England", "Lusail Stadium");
insert into FOOTBALL_MATCH values("2022-09-25", "16:00:00", 5, "Italy", "Scotland", "Lusail Stadium");
insert into FOOTBALL_MATCH values("2022-09-26", "16:00:00", 6, "Germany", "Italy", "Lusail Stadium");
insert into FOOTBALL_MATCH values("2022-09-27", "16:00:00", 7, "Spain", "Germany", "Lusail Stadium");
insert into FOOTBALL_MATCH values("2022-09-28", "16:00:00", 8, "Argentina", "Spain", "Lusail Stadium");
insert into FOOTBALL_MATCH values("2022-09-29", "16:00:00", 9, "Brazil", "Argentina", "Lusail Stadium");
insert into FOOTBALL_MATCH values("2022-09-30", "16:00:00", 10, "Tunisia", "Brazil", "Lusail Stadium");

/* populating seat */
insert into SEAT values(4, 4, 2, "A112", 1, 123, "Lusail Stadium", 100);
insert into SEAT values(4, 4, 2, "A113", 2, 456, "Lusail Stadium", 100);
insert into SEAT values(2, 4, 2, "A114", 3, 758, "Lusail Stadium", 300);
insert into SEAT values(3, 4, 2, "A115", 4, 534, "Lusail Stadium", 200);
insert into SEAT values(2, 4, 2, "A116", 5, 657, "Lusail Stadium", 300);
insert into SEAT values(2, 4, 2, "A117", 6, 345, "Lusail Stadium", 300);
insert into SEAT values(4, 4, 2, "A118", 7, 912, "Lusail Stadium", 100);
insert into SEAT values(1, 4, 2, "A119", 8, 432, "Lusail Stadium", 400);
insert into SEAT values(3, 4, 2, "A120", 9, 654, "Lusail Stadium", 200);
insert into SEAT values(1, 4, 2, "A121", 10, 918, "Lusail Stadium", 400);

/* populating ticket */
insert into TICKET values("G111111", 4, "individual", 100, 1, NULL, NULL, 4, 2, "A112", 1, 123, "Lusail Stadium", "2222222222222222");
insert into TICKET values("G222222", 4, "individual", 100, 2, NULL, NULL, 4, 2, "A113", 2, 456, "Lusail Stadium", "4444444444444444");
insert into TICKET values("G333333", 2, "individual", 300, 1, NULL, NULL, 4, 2, "A114", 3, 758, "Lusail Stadium", "6666666666666666");
insert into TICKET values("G444444", 3, "individual", 200, 1, NULL, NULL, 4, 2, "A115", 4, 534, "Lusail Stadium", "8888888888888888");
insert into TICKET values("G555555", 2, "individual", 300, 1, NULL, NULL, 4, 2, "A116", 5, 657, "Lusail Stadium", "1010101010101010");
insert into TICKET values("G666666", 2, "individual", 300, 1, NULL, NULL, 4, 2, "A117", 6, 345, "Lusail Stadium", "1133557799113355");
insert into TICKET values("G777777", 4, "individual", 100, 1, NULL, NULL, 4, 2, "A118", 7, 912, "Lusail Stadium", "3355779911335577");
insert into TICKET values("G888888", 1, "individual", 400, 1, NULL, NULL, 4, 2, "A119", 8, 432, "Lusail Stadium", "5577991133557799");
insert into TICKET values("G999999", 3, "individual", 200, 1, NULL, NULL, 4, 2, "A120", 9, 654, "Lusail Stadium", "7799113355779911");
insert into TICKET values("G123456", 1, "individual", 400, 1, NULL, NULL, 4, 2, "A121", 10, 918, "Lusail Stadium", "9911335577991133");

/* populating plays_in */
insert into Plays_in values("Qatar", 1);
insert into Plays_in values("Egypt", 1);
insert into Plays_in values("Egypt", 2);
insert into Plays_in values("Scotland", 2);
insert into Plays_in values("England", 3);
insert into Plays_in values("Egypt", 3);
insert into Plays_in values("Scotland", 4);
insert into Plays_in values("England", 4);
insert into Plays_in values("Italy", 5);
insert into Plays_in values("Scotland", 5);
insert into Plays_in values("Germany", 6);
insert into Plays_in values("Italy", 6);
insert into Plays_in values("Spain", 7);
insert into Plays_in values("Germany", 7);
insert into Plays_in values("Argentina", 8);
insert into Plays_in values("Spain", 8);
insert into Plays_in values("Brazil", 9);
insert into Plays_in values("Argentina", 9);
insert into Plays_in values("Tunisia", 10);
insert into Plays_in values("Brazil", 10);

/* populating is for */
insert into Is_for values(1, "G111111");
insert into Is_for values(2, "G222222");
insert into Is_for values(3, "G333333");
insert into Is_for values(4, "G444444");
insert into Is_for values(5, "G555555");
insert into Is_for values(6, "G666666");
insert into Is_for values(7, "G777777");
insert into Is_for values(8, "G888888");
insert into Is_for values(9, "G999999");
insert into Is_for values();