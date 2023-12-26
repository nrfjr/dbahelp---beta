WITH current_backup as (
	select
		bs.database_name,
		bs.backup_size,
		bs.backup_start_date,
		bmf.physical_device_name,
		Position = ROW_NUMBER() OVER(PARTITION BY bs.database_name ORDER BY bs.backup_start_date DESC)
		FROM msdb.dbo.backupmediafamily bmf
		JOIN msdb.dbo.backupmediaset bms ON bmf.media_set_id = bms.media_set_id
		JOIN msdb.dbo.backupset bs ON bms.media_set_id = bs.media_set_id
		WHERE bs.is_copy_only = 0 AND bs.database_name NOT IN ('master', 'model', 'msdb')
)
select * from current_backup where Position = 1;