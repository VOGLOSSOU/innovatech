-- ============================================
-- SCRIPT DE CORRECTION DES PRIX - Innovatech
-- ============================================

-- Étape 1: Voir les prix actuels et ce qu'ils vont devenir
SELECT
    id,
    nom,
    prix AS 'prix_actuel',
    prix * 1000 AS 'nouveau_prix'
FROM product;

-- Étape 2: Appliquer la correction (multiplier par 1000)
UPDATE product
SET prix = prix * 1000;

-- Étape 3: Vérifier que les prix sont corrigés
SELECT
    id,
    nom,
    prix AS 'prix_corrige'
FROM product;
