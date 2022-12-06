SELECT NAME AS "Control file Location",
       DECODE(STATUS, NULL, 'Control file exists', 'Control file is missing.') AS "File Status",
       BLOCK_SIZE AS "Block Size",
       FILE_SIZE_BLKS AS "File Size"
FROM V$CONTROLFILE