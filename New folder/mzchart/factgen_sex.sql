/* -------------------------------- **
**  Jenis Kelamin 2012
** -------------------------------- */
delete from fact_psex where thn=2012;
insert into fact_psex (thn, sex, jml)
select 2012, 1, count(*)
 from peg_identpeg 
 where kjkel=1 and kstatus in (1,2);
 
insert into fact_psex (thn, sex, jml)
select 2012, 2, count(*)
 from peg_identpeg 
 where kjkel=2 and kstatus in (1,2);
 

