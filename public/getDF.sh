
df -k  | grep /u0 | awk '
    BEGIN { ORS = ""; print " { "}
    /Filesystem/ {next}
    { printf "%s \"%s\":\"%s/%s\" ",
          separator, $7, $2, $3
      separator = ", "
    }
    END { print " } " }
' > df.txt