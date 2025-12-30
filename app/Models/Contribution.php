<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;

class Contribution extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'type', 'titre', 'nom_fichier', 'chemin_fichier',
        'contenu_texte', 'nature', 'thematique', 'langue', 'domaine',
        'description', 'statut', 'raison_rejet', 'ip_address', 'user_agent',
        'traite_par', 'traite_le'
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'traite_le' => 'datetime',
        'chemin_fichier' => 'array', // Cast pour les images multiples
    ];

    /**
     * Relation avec l'utilisateur contributeur
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relation avec l'admin qui a traité la contribution
     */
    public function traitePar(): BelongsTo
    {
        return $this->belongsTo(User::class, 'traite_par');
    }

    /**
     * Accessor pour les URLs des fichiers
     */
    public function getFichiersUrlsAttribute()
    {
        if (!$this->chemin_fichier) {
            return [];
        }

        // Pour les images multiples (tableau JSON)
        if ($this->type === 'image' && is_array($this->chemin_fichier)) {
            return array_map(function ($path) {
                return Storage::disk('public')->url($path);
            }, $this->chemin_fichier);
        }

        // Pour les fichiers simples
        if (is_string($this->chemin_fichier)) {
            return [Storage::disk('public')->url($this->chemin_fichier)];
        }

        return [];
    }

    /**
     * Vérifie si la contribution a des fichiers
     */
    public function hasFiles(): bool
    {
        return !empty($this->chemin_fichier);
    }

    /**
     * Scope pour les contributions approuvées
     */
    public function scopeApprouvees($query)
    {
        return $query->where('statut', 'approuve');
    }

    /**
     * Scope pour les contributions en attente
     */
    public function scopeEnAttente($query)
    {
        return $query->where('statut', 'en_attente');
    }

    /**
     * Scope pour les contributions rejetées
     */
    public function scopeRejetees($query)
    {
        return $query->where('statut', 'rejete');
    }

    /**
     * Scope pour les contributions par type
     */
    public function scopeParType($query, string $type)
    {
        return $query->where('type', $type);
    }

    /**
     * Accessor pour le statut formaté
     */
    public function getStatutFormateAttribute(): string
    {
        return match($this->statut) {
            'en_attente' => 'En attente',
            'approuve' => 'Approuvé',
            'rejete' => 'Rejeté',
            default => $this->statut
        };
    }

    /**
     * Accessor pour le type formaté
     */
    public function getTypeFormateAttribute(): string
    {
        return match($this->type) {
            'image' => 'Image',
            'texte' => 'Texte',
            'dataset' => 'Dataset',
            default => $this->type
        };
    }
}
