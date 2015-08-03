/* -------------------------------- **
**  Distribusi menurut kel umur
** -------------------------------- */
delete from fact_ese where thn=2012;
insert into fact_ese (thn, ese, sex, jml)
/* Eselon-1 */
select 2012, 1, 1, count(*) from peg_identpeg p join peg_jakhir j on (p.nip=j.nip)
 where j.keselon in (11,12)
	and p.kjkel=1 and p.kstatus=2 and p.kjpeg=1
union
select 2012, 1, 2, count(*) from peg_identpeg p join peg_jakhir j on (p.nip=j.nip)
 where j.keselon in (11,12)
	and p.kjkel=2 and p.kstatus=2 and p.kjpeg=1
union	/* Eselon-2 */
select 2012, 2, 1, count(*) from peg_identpeg p join peg_jakhir j on (p.nip=j.nip)
 where j.keselon in (21,22)
	and p.kjkel=1 and p.kstatus=2 and p.kjpeg=1
union
select 2012, 2, 2, count(*) from peg_identpeg p join peg_jakhir j on (p.nip=j.nip)
 where j.keselon in (21,22)
	and p.kjkel=2 and p.kstatus=2 and p.kjpeg=1