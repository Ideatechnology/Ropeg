/* -------------------------------------- **
**  Distribusi menurut Golongan / Ruang
** -------------------------------------- */
delete from fact_golru where thn=2012;
insert into fact_golru (thn, gol, pangkat, sex, jml)
/* Gol-1A */
select 2012, 1, 1, p.kjkel, count(*) from peg_identpeg p join peg_pakhir g on (p.nip=g.nip)
 where g.kgolru=111
	and kstatus=2 and p.kjpeg=1
  group by p.kjkel
union	/* Gol-1B */
select 2012, 1, 2, p.kjkel, count(*) from peg_identpeg p join peg_pakhir g on (p.nip=g.nip)
 where g.kgolru=112
	and kstatus=2 and p.kjpeg=1
  group by p.kjkel
union /* Gol-1C */
select 2012, 1, 3, p.kjkel, count(*) from peg_identpeg p join peg_pakhir g on (p.nip=g.nip)
 where g.kgolru=113
	and kstatus=2 and p.kjpeg=1
  group by p.kjkel
union	/* Gol-1D */
select 2012, 1, 4, p.kjkel, count(*) from peg_identpeg p join peg_pakhir g on (p.nip=g.nip)
 where g.kgolru=114
	and kstatus=2 and p.kjpeg=1
  group by p.kjkel

union 	/* Gol-2A */
select 2012, 2, 5, p.kjkel, count(*) from peg_identpeg p join peg_pakhir g on (p.nip=g.nip)
 where g.kgolru=121
	and kstatus=2 and p.kjpeg=1
  group by p.kjkel
union	/* Gol-2B */
select 2012, 2, 6, p.kjkel, count(*) from peg_identpeg p join peg_pakhir g on (p.nip=g.nip)
 where g.kgolru=122
	and kstatus=2 and p.kjpeg=1
  group by p.kjkel
union /* Gol-2C */
select 2012, 2, 7, p.kjkel, count(*) from peg_identpeg p join peg_pakhir g on (p.nip=g.nip)
 where g.kgolru=123
	and kstatus=2 and p.kjpeg=1
  group by p.kjkel
union	/* Gol-2D */
select 2012, 2, 8, p.kjkel, count(*) from peg_identpeg p join peg_pakhir g on (p.nip=g.nip)
 where g.kgolru=124
	and kstatus=2 and p.kjpeg=1
  group by p.kjkel	
  
union 	/* Gol-3A */
select 2012, 3, 9, p.kjkel, count(*) from peg_identpeg p join peg_pakhir g on (p.nip=g.nip)
 where g.kgolru=131
	and kstatus=2 and p.kjpeg=1
  group by p.kjkel
union	/* Gol-3B */
select 2012, 3, 10, p.kjkel, count(*) from peg_identpeg p join peg_pakhir g on (p.nip=g.nip)
 where g.kgolru=132
	and kstatus=2 and p.kjpeg=1
  group by p.kjkel
union 	/* Gol-3C */
select 2012, 3, 11, p.kjkel, count(*) from peg_identpeg p join peg_pakhir g on (p.nip=g.nip)
 where g.kgolru=133
	and kstatus=2 and p.kjpeg=1
  group by p.kjkel
union	/* Gol-3D */
select 2012, 3, 12, p.kjkel, count(*) from peg_identpeg p join peg_pakhir g on (p.nip=g.nip)
 where g.kgolru=134
	and kstatus=2 and p.kjpeg=1
  group by p.kjkel	 

  