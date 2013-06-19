<?php

/**
 * LibFileSystem - A library of functions for working with the filesystem. 
 * @author James Clayton <james.r.clayton@gmail.com>
 * @version 0.0.1
 * @copyright (c) 2013, James Clayton
 * @package LibFileSystem
 * @license http://opensource.org/licenses/ISC ISC License (ISC)
 */

class FileSystem {

  /**
	 * The BaseName() function returns the file name from a path.
	 * @param string $Path Required. No default. Specifies the path to check. 
	 * @param string $Suffix Optional. No default. Specifies a file extension. If the file name has this file extension, the file extension will not show
	 * @return string $BaseName 
	 */

	public function BaseName($Path, $Suffix) {
		$BaseName = basename($Path, $Suffix);
		return $BaseName;
	}

	/**
	 * The ChangeGroup() function changes the user group of the specified file. Returns TRUE on success and FALSE on failure.
	 * @param string $File Required. No default. Specifies the file to check. 
	 * @param string $Group Required. No default. Specifies the new group. Can be a group name or a group ID. 
	 * @return boolean $ChangeGroup Returns TRUE on success and FALSE on failure.
	 */

	public function ChangeGroup($File, $Group) {
		$ChangeGroup = chgrp($File, $Group);
		return $ChangeGroup;
	}

	/**
	 * The ChangeMode() function changes permissions of the specified file. Returns TRUE on success and FALSE on failure.
	 * @param string $File Required. No default. Specifies the file to check. 
	 * @param string $Mode Required. No default. Specifies the new permissions. The mode parameter consists of four numbers: The first number is always zero. The second number specifies permissions for the owner. The third number specifies permissions for the owner's user group. The fourth number specifies permissions for everybody else
	 * @return boolean $ChangeMode Returns TRUE on success and FALSE on failure.
	 */

	public function ChangeMode($File, $Mode) {
		$ChangeMode = chmod($File, $Mode);
		return $ChangeMode;
	}

	/**
	 * The ChangeOwner() function changes the owner of the specified file. Returns TRUE on success and FALSE on failure.
	 * @param string $File Required. No default. Specifies the file to check. 
	 * @param string $Mode Required. No default. Specifies the new owner. Can be a user name or a user ID.
	 * @return boolean $ChangeOwner Returns TRUE on success and FALSE on failure.
	 */

	public function ChangeOwner($File, $Owner) {
		$ChangeOwner = chown($File, $Owner); 
		return $ChangeOwner;
	}

	/**
	 * The ClearStatusCache() function clears the file status cache. PHP caches data for some functions for better performance. If a file is being checked several times in a script, you might want to avoid caching to get correct results. To do this, use the ClearStatusCache() function.
	 * @return boolean $ClearStatusCache Returns TRUE on success and FALSE on failure.
	 */

	public function ClearStatusCache() {
		$ClearStatusCache = clearstatcache();
		return $ClearStatusCache;
	}

	/**
	 * The Copy() function copies a file. This function returns TRUE on success and FALSE on failure.
	 * @param string $Source Required. No default. Specifies the file to copy. 
	 * @param string $Destination Required. No default. Specifies the file to copy to. 
	 * @return boolean $Copy Returns TRUE on success and FALSE on failure.
	 */

	public function Copy($Source, $Destination) {
		$Copy = copy($Source, $Destination);
		return $Copy;
	}

	/**
	 * The Delete() function deletes a file. This function returns TRUE on success, or FALSE on failure.
	 * @param string $File Required. No default. Specifies the file to delete. 
	 * @param string $Context Required. No default. Specifies the context of the file handle. Context is a set of options that can modify the behavior of a stream. 
	 * @return boolean $Delete Returns TRUE on success and FALSE on failure.
	 */

	public function Delete($File, $Context) {
		if(unlink($File, $Context)) {
			$Delete = True;
		} elseif(!unlink($File, $Context)) {
			$Delete = False;
		} else {
			$Delete = False;
		}

		return $Delete;
	}

	/**
	 * The DirectoryName() function returns the directory name from a path.
	 * @param string $File Required. No default. Specifies the path to delete. 
	 * @return string $DirectoryName 
	 */

	public function DirectoryName($Path) {
		$DirectoryName = dirname($Path);
		return $DirectoryName;
	}

	/**
	 * The FreeDiskSpace() function returns the free space, in bytes, of the specified directory.
	 * @param string $Directory Required. No default. Specifies the directory to check.  
	 * @param number $Metric. Optional. Default is MB. Options are "B" = bytes, "KB" = kilobytes, "MB" = megabytes, "GB" = gigabytes, "TB" = terabytes, "PB" = petabytes
	 * @return number $FreeDiskSpace Returns the free space, in bytes, of the specified directory.
	 */

	public function FreeDiskSpace($Directory, $Metric = "B") {
		if($Metric == "B") {
			$FreeDiskSpace = diskfreespace($Directory);
			return $FreeDiskSpace;
		} elseif($Metric == "MB") {
			$FreeDiskSpace = diskfreespace($Directory) / 1.049e+6;
			return $FreeDiskSpace;
		} elseif($Metric == "GB") {
			$FreeDiskSpace = diskfreespace($Directory) / 1.074e+9;
			return $FreeDiskSpace;
		} elseif($Metric == "TB") {
			$FreeDiskSpace = diskfreespace($Directory) / 1.1e+12;
			return $FreeDiskSpace;
		} elseif($Metric == "PB") {
			$FreeDiskSpace = diskfreespace($Directory) / 1.126e+15;
			return $FreeDiskSpace;
		} elseif($Metric = "KB") {
			$FreeDiskSpace = diskfreespace($Directory) / 1024;
			return $FreeDiskSpace;
		} else {
			$FreeDiskSpace = diskfreespace($Directory);
			return $FreeDiskSpace;
		}
		
	}

	/**
	 * The TotalDiskSpace() function returns the total space, in bytes, of the specified directory. Also see FreeDiskSpace().
	 * @param string $Directory Required. No default. Specifies the directory to check.  
	 * @param number $Metric. Optional. Default is MB. Options are "B" = bytes, "KB" = kilobytes, "MB" = megabytes, "GB" = gigabytes, "TB" = terabytes, "PB" = petabytes
	 * @return number $TotalDiskSpace Returns the total space, in bytes, of the specified directory.
	 */

	public function TotalDiskSpace($Directory, $Metric = "B") {
		if($Metric == "B") {
			$TotalDiskSpace = disk_total_space($Directory);
			return $TotalDiskSpace;
		} elseif($Metric == "MB") {
			$TotalDiskSpace = disk_total_space($Directory) / 1.049e+6;
			return $TotalDiskSpace;
		} elseif($Metric == "GB") {
			$TotalDiskSpace = disk_total_space($Directory) / 1.074e+9;
			return $TotalDiskSpace;
		} elseif($Metric == "TB") {
			$TotalDiskSpace = disk_total_space($Directory) / 1.1e+12;
			return $TotalDiskSpace;
		} elseif($Metric == "PB") {
			$TotalDiskSpace = disk_total_space($Directory) / 1.126e+15;
			return $TotalDiskSpace;
		} elseif($Metric = "KB") {
			$TotalDiskSpace = disk_total_space($Directory) / 1024;
			return $TotalDiskSpace;
		} else {
			$TotalDiskSpace = disk_total_space($Directory);
			return $TotalDiskSpace;
		}
	}

	/**
	 * The CloseFile() function closes an open file. This function returns TRUE on success or FALSE on failure.
	 * @param string $File Required. No default. Specifies the file to check.  
	 * @return boolean $CloseFile This function returns TRUE on success or FALSE on failure.
	 */

	public function CloseFile($File) {
		$CloseFile = fclose($File);
		return $CloseFile;
	}

	/**
	 * The OpenFile() function opens a file or URL. If OpenFile() fails, it returns FALSE and an error on failure. You can hide the error output by adding an '@' in front of the function name. Note: When writing to a text file, be sure to use the correct line-ending character! Unix systems use \n, Windows systems use \r\n, and Macintosh systems use \r as the line ending character. Windows offers a translation flag ('t') which will translate \n to \r\n when working with the file. You can also use 'b' to force binary mode. To use these flags, specify either 'b' or 't' as the last character of the mode parameter.
	 * @param string $File Required. No default. Specifies the file to open.
	 * @param string $Mode Required. No default. Specifies the type of access you require to the file/stream. Possible options: "r" (Read only. Starts at the beginning of the file). * "r+" (Read/Write. Starts at the beginning of the file). "w" (Write only. Opens and clears the contents of file; or creates a new file if it doesn't exist). "w+" (Read/Write. Opens and clears the contents of file; or creates a new file if it doesn't exist). "a" (Write only. Opens and writes to the end of the file or creates a new file if it doesn't exist). "a+" (Read/Write. Preserves file content by writing to the end of the file). "x" (Write only. Creates a new file. Returns FALSE and an error if file already exists). "x+" (Read/Write. Creates a new file. Returns FALSE and an error if file already exists).
	 * @param string $Path Optional. Default is 1. Set this parameter to '1' if you want to search for the file in the path (in php.ini) as well. 
	 * @param string $Context Specifies the context of the file handle. Context is a set of options that can modify the behavior of a stream. 
	 * @return boolean $OpenFile This function returns TRUE on success or FALSE on failure.
	 */

	public function OpenFile($File, $Mode, $Path, $Context) {
		$OpenFile = fopen($File, $Mode, $Path, $Context);
		return $OpenFile;
	}

	/**
	 * The EndOfFile() function checks if the "end-of-file" (EOF) has been reached. This function returns TRUE if an error occurs, or if EOF has been reached. Otherwise it returns FALSE. Tip: The EndOfFile() function is useful for looping through data of unknown length.
	 * @param string $File Required. No default. Specifies the file to check.  
	 * @return boolean $EndOfFile This function returns TRUE on success or FALSE on failure.
	 */

	public function EndOfFile($File) {
		if(feof($File)) {
			$EndOfFile = True;
			return $EndOfFile;
		} elseif(!feof($File)) {
			$EndOfFile = False;
			return False;
		} else {
			$EndOfFile = True;
			return $EndOfFile;
		}
	}

	/**
	 * The FlushFileBuffer() function writes all buffered output to an open file. Returns TRUE on success and FALSE on failure.
	 * @param string $File Required. No default. Specifies the file to check.  
	 * @return boolean $FlushFileBuffer This function returns TRUE on success or FALSE on failure.
	 */

	public function FlushFileBuffer($File) {
		$FlushFileBuffer = fflush($File);
		return $FlushFileBuffer;
	}

	/**
	 * The GetCharacter() function returns a single character from an open file. Note: This function is slow and should not be used on large files. If you need to read one character at a time from a large file, use GetLine() to read data one line at a time and then process the line one character at a time with fgetc().
	 * @param string $File Required. No default. Specifies the file to check.  
	 * @return boolean $GetCharacter This function returns TRUE on success or FALSE on failure.
	 */

	public function GetCharacter($File) {
		$GetCharacter = fgetc($File);
		return $GetCharacter;
	}

	/**
	 * The GetLine() function returns a line from an open file. The GetLine() function stops returning on a new line, at the specified length, or at EOF, whichever comes first. This function returns FALSE on failure. This function is best for large files. 
	 * @param string $File Required. No default. Specifies the file to check.  
	 * @param string $Length Optional. Default is 1024 bytes. Specifies the number of bytes to read. Default is 1024 bytes.
	 * @return boolean $GetLine This function returns TRUE on success or FALSE on failure.
	 */

	public function GetLine($File, $Length) {
		$GetLine = fgets($File, $Length);
		return $GetLine;
	}

	/**
	 * The PutLine() writes to an open file. The function will stop at the end of the file or when it reaches the specified length, whichever comes first. This function returns the number of bytes written on success, or FALSE on failure. The PutLine() function is an alias of the fwrite() function.
	 * @param string $File Required. No default. Specifies the open file to write to. 
	 * @param string $String Required. No default. Specifies the string to write to the open file. 
	 * @param string $Length Optional. Specifies the maximum number of bytes to write. 
	 * @return boolean $PutLine This function returns TRUE on success or FALSE on failure.
	 */

	public function PutLine($File, $String, $Length) {
		$PutLine = fputs($File, $String, $Length);
		return $PutLine;
	}

	/**
	 * The GetCSV() function parses a line from an open file, checking for CSV fields. The GetCSV() function stops returning on a new line, at the specified length, or at EOF, whichever comes first. This function returns the CSV fields in an array on success, or FALSE on failure and EOF. Note: Also see PutCSV function. 
	 * @param string $File Required. No default. Specifies the open file to read. 
	 * @param string $Length Optional. Default is 0. Specifies the maximum length of a line. Must be greater than the longest line (in characters) in the CSV file. Omitting this parameter (or setting it to 0) the line length is not limited, which is slightly slower. Note: This parameter is required in versions prior to PHP 5
	 * @param string $Separator Optional. Default is a comma (,). A character that specifies the field separator. 
	 * @param string $Enclosure Optional. Default is double quote "". A character that specifies the field enclosure character. 
	 * @return boolean $GetCSV This function returns TRUE on success or FALSE on failure.
	 */

	public function GetCSV($File, $Length = Null, $Separator = Null, $Enclosure = Null) {
		$GetCSV = fgetcsv($File, $Length, $Separator, $Enclosure);
		return $GetCSV;
	}
}

?>
