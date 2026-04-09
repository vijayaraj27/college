<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Web\Page;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class DownloadIQACMinutes extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'iqac:download-minutes';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Download IQAC meeting minutes from PSR website and update page with links';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->info("Starting IQAC Minutes download and update...");
        
        // Create directory if it doesn't exist
        $uploadDir = public_path('uploads/iqac/minutes');
        if (!file_exists($uploadDir)) {
            mkdir($uploadDir, 0755, true);
            $this->info("Created directory: {$uploadDir}");
        }
        
        // Meeting list with exact URLs from PSR website
        $meetings = [
            ['name' => 'TWENTY-TWO MEETING', 'display' => 'TWENTY-TWO MEETING', 'number' => 22, 'url' => 'http://psr.edu.in/wp-content/uploads/2025/01/Min-22.pdf', 'filename' => 'Min-22.pdf'],
            ['name' => 'TWENTY-ONE MEETING', 'display' => 'TWENTY-ONE MEETING', 'number' => 21, 'url' => 'http://psr.edu.in/wp-content/uploads/2025/01/Min-21.pdf', 'filename' => 'Min-21.pdf'],
            ['name' => 'TWENTIETH MEETING', 'display' => 'TWENTIETH MEETING', 'number' => 20, 'url' => 'https://psr.edu.in/wp-content/uploads/2023/06/Min-20.pdf', 'filename' => 'Min-20.pdf'],
            ['name' => 'NINETEENTH MEETING', 'display' => 'NINETEENTH MEETING', 'number' => 19, 'url' => 'https://psr.edu.in/wp-content/uploads/2023/06/Min-19.pdf', 'filename' => 'Min-19.pdf'],
            ['name' => 'EIGHTEENTH MEETING', 'display' => 'EIGHTEENTH MEETING', 'number' => 18, 'url' => 'https://psr.edu.in/wp-content/uploads/2023/06/Min-18.pdf', 'filename' => 'Min-18.pdf'],
            ['name' => 'SEVENTEENTH MEETING', 'display' => 'SEVENTEENTH MEETING', 'number' => 17, 'url' => 'https://psr.edu.in/wp-content/uploads/2021/06/min17.pdf', 'filename' => 'Min-17.pdf'],
            ['name' => 'SIXTEENTH MEETING', 'display' => 'SIXTEENTH MEETING', 'number' => 16, 'url' => 'https://psr.edu.in/wp-content/uploads/2021/06/min16.pdf', 'filename' => 'Min-16.pdf'],
            ['name' => 'FIFTEENTH MEETING', 'display' => 'FIFTEENTH MEETING', 'number' => 15, 'url' => 'https://psr.edu.in/wp-content/uploads/2021/06/min15.pdf', 'filename' => 'Min-15.pdf'],
            ['name' => 'FOURTEENTH MEETING', 'display' => 'FOURTEENTH MEETING', 'number' => 14, 'url' => 'https://psr.edu.in/wp-content/uploads/2021/06/min14.pdf', 'filename' => 'Min-14.pdf'],
            ['name' => 'THIRTEENTH MEETING', 'display' => 'THIRTEENTH MEETING', 'number' => 13, 'url' => 'https://psr.edu.in/wp-content/uploads/2021/06/min13.pdf', 'filename' => 'Min-13.pdf'],
            ['name' => 'TWELFTH MEETING', 'display' => 'TWELFTH MEETING', 'number' => 12, 'url' => 'https://psr.edu.in/wp-content/uploads/2021/06/min12.pdf', 'filename' => 'Min-12.pdf'],
            ['name' => 'ELEVENTH MEETING', 'display' => 'ELEVENTH MEETING', 'number' => 11, 'url' => 'https://psr.edu.in/wp-content/uploads/2021/06/min11.pdf', 'filename' => 'Min-11.pdf'],
            ['name' => 'TENTH MEETING', 'display' => 'TENTH MEETING', 'number' => 10, 'url' => 'https://psr.edu.in/wp-content/uploads/2021/06/min10.pdf', 'filename' => 'Min-10.pdf'],
            ['name' => 'NINETH MEETING', 'display' => 'NINETH MEETING', 'number' => 9, 'url' => 'https://psr.edu.in/wp-content/uploads/2021/06/min9.pdf', 'filename' => 'Min-9.pdf'],
            ['name' => 'EIGHTH MEETING', 'display' => 'EIGHTH MEETING', 'number' => 8, 'url' => 'https://psr.edu.in/wp-content/uploads/2021/06/min8.pdf', 'filename' => 'Min-8.pdf'],
            ['name' => 'SEVENTH MEETING', 'display' => 'SEVENTH MEETING', 'number' => 7, 'url' => 'https://psr.edu.in/wp-content/uploads/2021/06/min7.pdf', 'filename' => 'Min-7.pdf'],
            ['name' => 'SIXTH MEETING', 'display' => 'SIXTH MEETING', 'number' => 6, 'url' => 'https://psr.edu.in/wp-content/uploads/2021/06/min6.pdf', 'filename' => 'Min-6.pdf'],
            ['name' => 'FIFTH MEETING', 'display' => 'FIFTH MEETING', 'number' => 5, 'url' => 'https://psr.edu.in/wp-content/uploads/2021/06/min5.pdf', 'filename' => 'Min-5.pdf'],
            ['name' => 'FOURTH MEETING', 'display' => 'FOURTH MEETING', 'number' => 4, 'url' => 'https://psr.edu.in/wp-content/uploads/2021/06/min4.pdf', 'filename' => 'Min-4.pdf'],
            ['name' => 'THIRD MEETING', 'display' => 'THIRD MEETING', 'number' => 3, 'url' => 'https://psr.edu.in/wp-content/uploads/2021/06/min3.pdf', 'filename' => 'Min-3.pdf'],
            ['name' => 'SECOND MEETING', 'display' => 'SECOND MEETING', 'number' => 2, 'url' => 'https://psr.edu.in/wp-content/uploads/2021/06/min2.pdf', 'filename' => 'Min-2.pdf'],
            ['name' => 'FIRST MEETING', 'display' => 'FIRST MEETING', 'number' => 1, 'url' => 'https://psr.edu.in/wp-content/uploads/2021/06/min1.pdf', 'filename' => 'Min-1.pdf'],
        ];
        $downloadedFiles = [];
        $failedDownloads = [];
        
        $this->info("Attempting to download meeting minutes...");
        
        foreach ($meetings as $meeting) {
            $this->line("Processing: {$meeting['display']}...");
            
            // Try different year folders and URL patterns
            $yearFolders = ['2025/01', '2024/12', '2024/11', '2024/10', '2024/09', '2024/08', '2024/07', '2024/06', '2024/05', '2024/04', '2024/03', '2024/02', '2024/01', '2023/12', '2023/11', '2023/10'];
            $urlPatterns = [];
            
            foreach ($yearFolders as $yearFolder) {
                $urlPatterns[] = 'http://psr.edu.in/wp-content/uploads/' . $yearFolder . '/Min-' . $meeting['number'] . '.pdf';
                $urlPatterns[] = 'http://psr.edu.in/wp-content/uploads/' . $yearFolder . '/min-' . $meeting['number'] . '.pdf';
                $urlPatterns[] = 'http://psr.edu.in/wp-content/uploads/' . $yearFolder . '/MIN-' . $meeting['number'] . '.pdf';
            }
            
            $fileName = 'Min-' . $meeting['number'] . '.pdf';
            $filePath = $uploadDir . '/' . $fileName;
            
            // Skip if file already exists
            if (file_exists($filePath)) {
                $this->info("  ✓ File already exists: {$fileName}");
                $downloadedFiles[] = [
                    'name' => $meeting['display'],
                    'file' => $fileName,
                    'url' => url('uploads/iqac/minutes/' . $fileName)
                ];
                $downloaded = true;
                continue;
            }
            
            $downloaded = false;
            foreach ($urlPatterns as $url) {
                try {
                    $this->line("  Trying: {$url}");
                    $response = Http::timeout(15)->get($url);
                    
                    if ($response->successful()) {
                        $body = $response->body();
                        // Check if it's actually a PDF
                        if (substr($body, 0, 4) === '%PDF' || strlen($body) > 1000) {
                            file_put_contents($filePath, $body);
                            $fileSize = filesize($filePath);
                            $this->info("  ✓ Downloaded: {$fileName} ({$fileSize} bytes) from {$url}");
                            $downloadedFiles[] = [
                                'name' => $meeting['display'],
                                'file' => $fileName,
                                'url' => asset('uploads/iqac/minutes/' . $fileName)
                            ];
                            $downloaded = true;
                            break;
                        }
                    }
                } catch (\Exception $e) {
                    // Continue to next pattern
                    continue;
                }
            }
            
            if (!$downloaded) {
                $this->warn("  ✗ Could not download: {$meeting['display']}");
            }
            
            if (!$downloaded) {
                $this->warn("  ✗ Could not download: {$meeting['display']}");
                $failedDownloads[] = $meeting;
                // Create placeholder with external link
                $downloadedFiles[] = [
                    'name' => $meeting['display'],
                    'file' => $fileName,
                    'url' => 'http://psr.edu.in/wp-content/uploads/2025/01/Min-' . $meeting['number'] . '.pdf',
                    'number' => $meeting['number'],
                    'missing' => true
                ];
            }
        }
        
        // Update the page content with anchor tags
        $this->info("\nUpdating page content with anchor tags...");
        $page = Page::where('slug', 'iqac-minutes-action-taken')->first();
        
        if (!$page) {
            $this->error("IQAC Minutes page not found!");
            return Command::FAILURE;
        }
        
        $content = '<h2>IQAC Minutes of Meeting / Action Taken</h2>
<p>The IQAC conducts regular meetings to discuss quality-related issues, review progress, and plan quality enhancement initiatives. The minutes of these meetings and action taken reports are documented for transparency and accountability.</p>

<h3>Available Meeting Minutes:</h3>
<ul>';
        
        foreach ($downloadedFiles as $file) {
            if (isset($file['missing']) && $file['missing']) {
                // Fallback to external link if file not downloaded
                $externalUrl = 'http://psr.edu.in/wp-content/uploads/2025/01/Min-' . $file['number'] . '.pdf';
                $content .= '<li><a href="' . $externalUrl . '" target="_blank" style="color: #f5874f; text-decoration: none;">' . $file['name'] . ' <i class="fal fa-external-link"></i></a></li>';
            } else {
                // Use proper asset URL
                $localUrl = url('uploads/iqac/minutes/' . $file['file']);
                $content .= '<li><a href="' . $localUrl . '" target="_blank" style="color: #f5874f; text-decoration: none;">' . $file['name'] . ' <i class="fal fa-download"></i></a></li>';
            }
        }
        
        $content .= '</ul>

<p>These documents provide detailed records of discussions, decisions, and action items from IQAC meetings, ensuring systematic follow-up and implementation of quality enhancement measures.</p>';
        
        $page->description = $content;
        $page->save();
        
        $this->info("✓ Page updated successfully!");
        
        // Summary
        $this->info("\n=== Download Summary ===");
        $this->info("Successfully downloaded: " . count(array_filter($downloadedFiles, function($f) { return !isset($f['missing']); })));
        $this->info("Failed downloads: " . count($failedDownloads));
        
        if (count($failedDownloads) > 0) {
            $this->warn("\nFailed downloads (need manual upload):");
            foreach ($failedDownloads as $failed) {
                $this->warn("  - {$failed['display']}");
            }
            $this->info("\nYou may need to manually download these files from https://psr.edu.in/iqac/ and upload them to: {$uploadDir}");
        }
        
        return Command::SUCCESS;
    }
}
