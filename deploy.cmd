net use \\dev-few02.fcr.local M35t0P7n3D3t1 /user:fcr\teamcity
echo A | xcopy /E .\* \\dev-few02.fcr.local\webs\dev.kdm
net use /delete \\dev-few02.fcr.local
