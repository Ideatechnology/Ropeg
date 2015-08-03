/* -------------------------------- **
**  Distribusi menurut kel umur
** -------------------------------- */
delete from fact_funk where thn=2012;
insert into fact_funk (thn, funk, sex, jml)
/* SD */
select 2012, 1, 1, count(*) from peg_identpeg p join peg_pdakhir pd on (p.nip=pd.nip)
 where ktpu in (10,11)
	and p.kjkel=1 and p.kstatus in (1,2)
union
select 2012, 1, 2, count(*) from peg_identpeg p join peg_pdakhir pd on (p.nip=pd.nip)
 where ktpu in (10,11)
	and p.kjkel=2 and p.kstatus in (1,2)
