/* -------------------------------- **
**  Distribusi menurut kel umur
** -------------------------------- */
delete from fact_edu where thn=2012;
insert into fact_edu (thn, edu, sex, jml)
/* SD */
select 2012, 1, 1, count(*) from peg_identpeg p join peg_pdakhir pd on (p.nip=pd.nip)
 where ktpu in (10,11)
	and p.kjkel=1 and p.kstatus in (1,2)
union
select 2012, 1, 2, count(*) from peg_identpeg p join peg_pdakhir pd on (p.nip=pd.nip)
 where ktpu in (10,11)
	and p.kjkel=2 and p.kstatus in (1,2)
union /* SMP */
select 2012, 2, 1, count(*) from peg_identpeg p join peg_pdakhir pd on (p.nip=pd.nip)
 where ktpu in ('20','21')
	and p.kjkel=1 and p.kstatus in (1,2)
union
select 2012, 2, 2, count(*) from peg_identpeg p join peg_pdakhir pd on (p.nip=pd.nip)
 where ktpu in ('20','21')
	and p.kjkel=2 and p.kstatus in (1,2)
union /* SMA */
select 2012, 3, 1, count(*) from peg_identpeg p join peg_pdakhir pd on (p.nip=pd.nip)
 where ktpu in ('30','31')
	and p.kjkel=1 and p.kstatus in (1,2)
union
select 2012, 3, 2, count(*) from peg_identpeg p join peg_pdakhir pd on (p.nip=pd.nip)
 where ktpu in ('30','31')
	and p.kjkel=2 and p.kstatus in (1,2)
union /* D.1 */
select 2012, 4, 1, count(*) from peg_identpeg p join peg_pdakhir pd on (p.nip=pd.nip)
 where ktpu in ('34','35')
	and p.kjkel=1 and p.kstatus in (1,2)
union
select 2012, 4, 2, count(*) from peg_identpeg p join peg_pdakhir pd on (p.nip=pd.nip)
 where ktpu in ('34','35')
	and p.kjkel=2 and p.kstatus in (1,2)	
 
