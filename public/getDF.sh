# ############################################################################
# $KCC Property Holdings Inc.
# $Revision: 0001 $:
# $Author: Nurfajar S. Sali $:
# $Date: 11/09/2022$:
# $Id: Get Disk Free/Total Size $:
# ############################################################################

. ~/.profile

df -k  | grep /u0 | awk '
    BEGIN { ORS = ""; print " { "}
    /Filesystem/ {next}
    { printf "%s \"%s\":\"%s/%s\" ",
          separator, $7, $2, $3
      separator = ", "
    }
    END { print " } " }
' > /home/oracle/dba_scripts/df.txt